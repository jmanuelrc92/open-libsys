<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i> <span>Entities</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        	<li><a href="<?php echo $this->Url->build(['controller' => 'authors', 'action' => 'index']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Authors</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'books', 'action' => 'index']); ?>"><i class="fa fa-book" aria-hidden="true"></i> Books</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'publishing_houses', 'action' => 'index']); ?>"><i class="fa fa-university" aria-hidden="true"></i> Publishing Houses</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'locations', 'action' => 'index']); ?>"><i class="fa fa-map-pin" aria-hidden="true"></i> Locations</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cogs"></i> <span>Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        	<li><a href="<?php echo $this->Url->build(['controller' => 'book_inventories', 'action' => 'index']); ?>"><i class="fa fa-dropbox" aria-hidden="true"></i> Inventory</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'loans', 'action' => 'index']); ?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Loans</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>"><i class="fa fa-users" aria-hidden="true"></i> Registration</a></li>
        </ul>
    </li>
</ul>
