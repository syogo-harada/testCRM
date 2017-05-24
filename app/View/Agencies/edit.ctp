<h1>Edit User</h1>
<?php
    echo $this->Form->create('Agency');
    echo $this->Form->input('agency_name');
    echo $this->Form->end('更新');