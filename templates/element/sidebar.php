<?php
/**
 * @var \App\View\AppView $this
 */

$controller = $this->getRequest()->getParam('controller');
$action = $this->getRequest()->getParam('action');
$sidebarItems = [
    [
        'label' => __('Dashboard'),
        'icon' => 'home',
        'url' => $this->Url->build([
            'controller' => 'Agent',
            'action' => 'index',
        ]),
        'is_default' => true,
        'is_active' => $controller === 'Agens' && $action === 'index',
    ], [
        'label' => __('Customers'),
        'icon' => 'users',
        'url' => $this->Url->build([
            'controller' => 'Agent',
            'action' => 'customers',
        ]),
        'is_default' => false,
        'is_active' => $controller === 'Agent' && $action === 'customers',
    ],
];
?>

<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="<?php echo $this->Url->build('/') ?>" class="aside-logo tx-20 tx-spacing-2"><img alt="<?php echo __('Logo') ?>" style="width: 80%" src="<?php echo $this->Url->build('/'); ?>img/logo.png" /></span></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <ul class="nav nav-aside">
            <?php foreach ($sidebarItems as $item) { ?>
                <li class="nav-item <?php echo $item['is_active'] ? 'active' : ''; ?>">
                    <a href="<?php echo $item['url']; ?>" class="nav-link tx-spacing-2 text-truncate"><i data-feather="<?php echo $item['icon']; ?>"></i> <span><?php echo $item['label']; ?></span></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</aside>
