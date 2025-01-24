<?php 


$menuItems = [
    ['module_url' => 'purchase_order/12', 'module_prefix' => 'PO', 'menu_type' => 2, 'module_name' => 'Purchase Order'],
    ['module_url' => 'batchGroup/2', 'module_prefix' => 'BG', 'menu_type' => 2, 'module_name' => 'Batch Group'],
    ['module_url' => 'subGroup/5', 'module_prefix' => 'SG', 'menu_type' => 2, 'module_name' => 'Sub Group'],
    ['module_url' => 'contact', 'module_prefix' => 'prefix4', 'menu_type' => 2, 'module_name' => 'Contact']
];

// Loop through dummy data:
echo '<ul>';
echo '<li><a href="/backend_index"><i class="fa fa-users fa-lg"></i> Dashboard</a></li>';
echo '</ul>';
$menu_type = 0;
foreach($menuItems as $menuItem) { 
    $module_url = url('/') . '/' . $menuItem['module_url']. '/' . $menuItem['module_prefix'];
    if($menuItem['menu_type'] != $menu_type) {
        echo '</ul>';

        if($menuItem['menu_type'] == 2) {
            echo '<li><a href="' . $module_url . '"><i class="fa fa-dashboard fa-lg"></i> ' . $menuItem['module_name'] . '</a></li>';
        } else {
            echo '<li data-toggle="collapse" data-target="#' . $menuItem['module_name'] . '" class="collapsed">';
            echo '<a><i class="fa fa-globe fa-lg"></i> ' . $menuItem['module_name'] . ' <span class="arrow"></span></a>';
            echo '</li>';
            echo '<ul class="sub-menu collapse" id="' . $menuItem['module_name'] . '">';
        }
    } else {
        echo '<li><a href="' . $module_url . '"><i class="fa fa-dashboard fa-lg"></i> ' . $menuItem['module_name'] . '</a></li>';
    }
}

// Additional dummy data for logout
echo '<ul>';
echo '<li><a href="/logout"><i class="fa fa-users fa-lg"></i> Logout</a></li>';
echo '</ul>';
?>
