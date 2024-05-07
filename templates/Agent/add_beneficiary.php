<?php
/**
 * @var App\View\AppView $this
 * @var array $response
 */
?>

<div class="content-header">
    <div>
        <h4 class="mg-b-0 tx-spacing-2"><i data-feather="airplay" class="mr-2"></i><?php echo __('Add Beneficiary') ?></h4>
    </div>
</div>

<div class="content-body">
    <?php echo $this->Flash->render(); ?>
    <?php echo $this->Form->create(null, [
        'autocomplete' => 'off',
        'data-submit' => 'disable',
        'novalidate',
        'templates' => [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            'inputContainerError' => '<div class="form-group was-validated">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback mt-2">{{content}}</div>',
            'label' => '<label class="tx-12 font-weight-bold tx-spacing-2"{{attrs}}>{{text}}</label>',
        ],
    ]);
    $this->Form->setConfig([
        'autoSetCustomValidity' => false,
    ]);?>
    <div class="row row-xs">
        <div class="col-sm-5 d-flex align-content-stretch">
            <div class="card card-border w-100">
                <div class="card-body">
                    <div class="ui inverted dimmer">
                        <div class="ui loader"></div>
                    </div>
                    <?php echo $this->Form->control('mobile_number', [
                        'type' => 'number',
                        'class' => 'form-control',
                        'label' =>  __("Mobile Number"),
                    ]); ?>
                    <button type="submit" class="btn btn-block btn-success tx-spacing-2 tx-12"><?php echo __("Submit"); ?></button>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
