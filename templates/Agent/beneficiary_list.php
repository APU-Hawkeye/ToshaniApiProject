<?php
/**
 * @var App\View\AppView $this
 * @var array $response
 * @var int $mobile
 */
?>

<div class="content-header">
    <div>
        <h4 class="mg-b-0 tx-spacing-2"><i data-feather="airplay" class="mr-2"></i><?php echo __('Beneficiary List') ?></h4>
    </div>
    <nav class="nav">
        <a href="<?php echo $this->Url->build([
            'controller' => 'Agents',
            'action' => 'addBeneficiary',
            $mobile,
        ])?>" class="nav-link">Add Beneficiary</a>
    </nav>
</div>
<div class="content-body p-0">
    <?php echo $this->Flash->render(); ?>
        <div class="table-responsive">
            <table class="table table-hover border-bottom bg-white mb-0 us-table">
                <thead>
                <tr class="bg-light">
                    <th  style="width:1%"></th>
                    <th class="tx-13 tx-spacing-2"><?php echo  __('Name') ?></th>
                    <th class="tx-13 tx-spacing-2"><?php echo  __('Bank Name') ?></th>
                    <th class="tx-13 tx-spacing-2"><?php echo  __('Account Number') ?></th>
                    <th class="tx-13 tx-spacing-2"><?php echo  __('IFSC Code') ?></th>
                    <th class="tx-13 tx-spacing-2"><?php echo  __('Ben ID') ?></th>
                    <th class="tx-13 tx-spacing-2"><?php echo  __('Beneficiary Number') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if ($response->isEmpty()) { ?>
                    <tr>
                        <td colspan="10" class="text-md-center tx-spacing-2"><?php echo __('No Data To Show')?></td>
                    </tr>
                <?php } else { ?>
                    <?php
                    foreach ($response->data as $result) {  ?>
                        <tr>
                            <td class="tx-12 tx-spacing-2"><?php echo $result->ben_name; ?></td>
                            <td class="tx-12 tx-spacing-2"><?php echo $result->bank_name; ?></td>
                            <td class="tx-12 tx-spacing-2"><?php echo $result->ben_account_number; ?></td>
                            <td class="tx-12 tx-spacing-2"><?php echo $result->ben_ifsc_code; ?></td>
                            <td class="tx-12 tx-spacing-2"><?php echo $result->ben_id; ?></td>
                            <td class="tx-12 tx-spacing-2"><?php echo $result->ben_number; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
</div>
