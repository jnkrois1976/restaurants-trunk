<?php 
    $member_name = $this->session->userdata('member_name');
    $user_name = $this->session->userdata('user_name');
    $account_created = $this->session->userdata('accountcreated');
    $is_logged_in = $this->session->userdata('is_logged_in');
?>

<?php if($member_name): ?>
    <a href="/profile/dashboard" class="normalLink" id="toolTipAccount" data-toggle="tooltip" data-animation="auto bottom" title="<?=$this->lang->line('tooltip_account_link')?>">
        <span class="glyphicon glyphicon-user"></span>  <?=$this->lang->line('header_link_greeting').' '.$member_name?>
    </a>
    &nbsp;|&nbsp;
    <a href='/site/log_out' class="normalLink">
        <span class="glyphicon glyphicon-lock"></span> <?=$this->lang->line('header_link_exit')?>
    </a>
<?php elseif($user_name): ?>
    <a href="/profile/dashboard" class="normalLink" id="toolTipAccount" data-toggle="tooltip" data-animation="auto bottom" title="<?=$this->lang->line('tooltip_account_link')?>">
        <span class="glyphicon glyphicon-user"></span> <?=$this->lang->line('header_link_greeting').' '.$member_name?>
    </a>
    &nbsp;|&nbsp;
    <a href='/site/log_out' class="normalLink">
        <span class="glyphicon glyphicon-lock"></span> <?=$this->lang->line('header_link_exit')?>
    </a>
<?php elseif(!$account_created || !$is_logged_in): ?>
    <a class="normalLink preventDefault" data-toggle="modal" href="#registerModal">
        <span class="glyphicon glyphicon-user"></span> <?=$this->lang->line('header_link_register')?>
    </a>
    &nbsp;|&nbsp;
    <a href="#" class="normalLink preventDefault" id="loginLink">
        <span class="glyphicon glyphicon-lock"></span> <?=$this->lang->line('header_link_login')?>
    </a>
<?php endif; ?>

