<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\API\Toshani;
use Cake\Event\EventInterface;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class AgentController
 *
 * @property \App\Service\API\Toshani $object
 */
class AgentController extends AppController
{
    /**
     * @param \Cake\Event\EventInterface $event
     * @return void
     */
    public function beforeFilter(EventInterface $event)
    {
        $object = new Toshani(env('SECRET_KEY'));
        $this->object = $object;
        parent::beforeFilter($event);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {
        if ($this->getRequest()->is('post')) {
            /** @var int $postData */
            $postData = $this->getRequest()->getData('mobile_number');
            $response = $this->object->getCustomer((int)$postData);
            if ($response->result === 1) {
                $this->Flash->success($response->message);

                return $this->redirect([
                    'controller' => 'Agent',
                    'action' => 'beneficiaryList',
                    $postData,
                ]);
            } elseif ($response->result === 0) {
                $this->Flash->error($response->message);
            } elseif ($response->result === 2) {
                $this->Flash->success($response->message);

                return $this->redirect([
                    'action' => 'validateOTP',
                    (int)$postData,
                ]);
            }
        }
        $this->set('titleForLayout', __('Customers'));
    }

    /**
     * @param int $mobileNumber Mobile Number
     * @return \Cake\Http\Response|void|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function validateOTP(int $mobileNumber)
    {
        if ($this->getRequest()->is('post')) {
            /** @var int $otp */
            $otp = $this->getRequest()->getData('otp');
            /** @var string $name */
            $name = $this->getRequest()->getData('name');
            $response = $this->object->validateOTP($mobileNumber, $otp, $name);
            if ($response->result === 1) {
                $this->Flash->success($response->message);

                return $this->redirect([
                    'action' => 'beneficiaryList',
                    $mobileNumber,
                ]);
            } elseif ($response->result === 0) {
                $this->Flash->success($response->message);
            }
        }
        $this->set('mobile', $mobileNumber);
        $this->set('titleForLayout', __('OTP Validation for MobileNumber'));
    }

    /**
     * @throws GuzzleException
     */
    public function addBeneficiary(int $mobileNumber)
    {
        if ($this->getRequest()->is('post')) {
            /** @var string $name */
            $name = $this->getRequest()->getData('name');
            /** @var int $accountNumber */
            $accountNumber = $this->getRequest()->getData('account_number');
            /** @var string $bankCode */
            $bankCode = $this->getRequest()->getData('bank_code');
            /** @var string $ifscCode */
            $ifscCode = $this->getRequest()->getData('ifsc_code');
            /** @var string $name */
            $beneficiaryMobile = $this->getRequest()->getData('beneficiary_mobile');
            $response = $this->object->addBeneficiary(
                $mobileNumber,
                $name,
                $accountNumber,
                $bankCode,
                $ifscCode,
                $beneficiaryMobile
            );
            if ($response->result === 1) {
                $this->Flash->success($response->message);

                return $this->redirect([
                    'action' => 'beneficiaryList',
                    $mobileNumber,
                ]);
            } elseif ($response->result === 0) {
                $this->Flash->success($response->message);
            } elseif ($response->result === "0") {
                $this->Flash->success($response->message);
            }
        }
        $this->set('mobile', $mobileNumber);
        $this->set('titleForLayout', __('Add Beneficiary'));
    }

    /**
     * @param int $mobileNumber Mobile Number
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function beneficiaryList(int $mobileNumber)
    {
        $response = $this->object->beneficiaryList($mobileNumber);
        if ($response->result === 1) {
            return $response;
        } elseif ($response->result === 0) {
            $this->Flash->success($response->message);
        }

        $this->set('response', $response);
        $this->set('mobile', $mobileNumber);
        $this->set('titleForLayout', __('Beneficiary List'));
    }
}
