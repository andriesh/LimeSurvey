
<div class='menubar'>
	<div class='menubar-title ui-widget-header'>
		<div class='menubar-title-left'>
			<strong><?php $clang->eT("Administration");?></strong>
			<?php
			if(Yii::app()->session['loginID'])
	    	{ ?>
	 			 --  <?php $clang->eT("Logged in as:");?><strong>
		        <a href="<?php echo $this->createUrl("/admin/user/personalsettings"); ?>" title="<?php $clang->eTview("Edit your personal preferences");?>">
		        <?php echo Yii::app()->session['user'];?> <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>profile_edit.png' alt='<?php $clang->eT("Edit your personal preferences");?>' /></a>
		        </strong>
	        <?php } ?>
	    </div>
	    <?php
		if($showupdate)
    	{ ?>
    	<div class='menubar-title-right'><a href='<?php echo $this->createUrl("admin/globalsettings");?>'><?php echo sprintf($clang->gT('Update available: %s'),$updateversion."($updatebuild)");?></a></div>
    	<?php } ?>
	</div>
    <div class='menubar-main'>
    <div class='menubar-left'>
	    <a href="<?php echo $this->createUrl("/admin"); ?>" title="<?php $clang->eTview("Default administration page");?>">
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>home.png' alt='<?php $clang->eT("Default administration page");?>' width='' height='<?php echo $iconsize;?>'/></a>

	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>blank.gif' alt='' width='11' />
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>seperator.gif' alt='' />

	    <a href="<?php echo $this->createUrl("admin/user/index"); ?>" title="<?php $clang->eTview("Manage survey administrators");?>" >
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>security.png' alt='<?php $clang->eT("Manage survey administrators");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>

		<?php
		if(Yii::app()->session['USER_RIGHT_SUPERADMIN'] == 1)
		{ ?>
	    <a href="<?php echo $this->createUrl("admin/globalsettings"); ?>" title="<?php $clang->eTview("Global settings");?>" >
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>global.png' alt='<?php $clang->eT("Global settings");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>seperator.gif' alt='' />
		<?php }
		if(Yii::app()->session['USER_RIGHT_CONFIGURATOR'] == 1)
		{ ?>
	    <a href="<?php echo $this->createUrl("admin/checkintegrity"); ?>" title="<?php $clang->eTview("Check Data Integrity");?>">
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>checkdb.png' alt='<?php $clang->eT("Check Data Integrity");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
		<?php
        }
		if(Yii::app()->session['USER_RIGHT_CONFIGURATOR'] == 1)
		{

	        if (in_array(Yii::app()->db->getDriverName(), array('mysql', 'mysqli')) || Yii::app()->getConfig('demoMode') == true)
	        {

				?>

				<a href="<?php echo $this->createUrl("admin/dumpdb"); ?>" title="<?php $clang->eTview("Backup Entire Database");?>" >
				<img src='<?php echo Yii::app()->getConfig('adminimageurl');?>backup.png' alt='<?php $clang->eT("Backup Entire Database");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/>
				</a>

	        <?php } else { ?>
	            <img src='<?php echo Yii::app()->getConfig('adminimageurl'); ?>backup_disabled.png' alt='<?php $clang->eT("The database export is only available for MySQL databases. For other database types please use the according backup mechanism to create a database dump."); ?>' />
	        <?php } ?>

	        <img src='<?php echo Yii::app()->getConfig('adminimageurl'); ?>seperator.gif' alt='' />

			<?php
		}
	    if(Yii::app()->session['USER_RIGHT_MANAGE_LABEL'] == 1)
		{
	    ?>

	    <a href="<?php echo $this->createUrl("admin/labels/view"); ?>" title="<?php $clang->eTview("Edit label sets");?>" >
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>labels.png'  alt='<?php $clang->eT("Edit label sets");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>seperator.gif' alt='' />
	    <?php }
	    if(Yii::app()->session['USER_RIGHT_MANAGE_TEMPLATE'] == 1)
		{ ?>
	    <a href="<?php echo $this->createUrl("admin/templates/view"); ?>" title="<?php $clang->eTview("Template Editor");?>" >
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>templates.png' alt='<?php $clang->eT("Template Editor");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
	    <?php } ?>
            <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>seperator.gif' alt='' />
        <?php
        if(Yii::app()->session['USER_RIGHT_PARTICIPANT_PANEL'] == 1)
		{ 	 ?>
            <a href="<?php echo $this->createUrl("admin/participants/index"); ?>" title="<?php $clang->eTview("Participant panel");?>" >
	        <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>tokens.png' alt='<?php $clang->eT("Participant panel");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
        <?php } ?>
	</div>
	<div class='menubar-right'>
        <label for='surveylist'><?php $clang->eT("Surveys:");?></label>
	    <select id='surveylist' name='surveylist' onchange="window.open(this.options[this.selectedIndex].value,'_top')">
	    <?php echo getSurveyList(false, false, $surveyid); ?>
	    </select>
        <a href="<?php echo $this->createUrl("admin/survey/index"); ?>" title="<?php $clang->eTview("Detailed list of surveys");?>" >
        <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>surveylist.png' alt='<?php $clang->eT("Detailed list of surveys");?>' />
        </a>

	    <?php
	    if(Yii::app()->session['USER_RIGHT_CREATE_SURVEY'] == 1)
		{ ?>

	    <a href="<?php echo $this->createUrl("admin/survey/newsurvey"); ?>" title="<?php $clang->eTview("Create, import, or copy a survey");?>" >
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>add.png' alt='<?php $clang->eT("Create, import, or copy a survey");?>' /></a>
	    <?php } ?>


	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>seperator.gif' alt='' />
	    <a href="<?php echo $this->createUrl("admin/authentication/logout"); ?>" title="<?php $clang->eTview("Logout");?>" >
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>logout.png' alt='<?php $clang->eT("Logout");?>' /></a>

	    <a href="http://docs.limesurvey.org" title="<?php $clang->eTview("LimeSurvey online manual");?>" >
	    <img src='<?php echo Yii::app()->getConfig('adminimageurl');?>showhelp.png' alt='<?php $clang->eT("LimeSurvey online manual");?>' /></a>
	</div>
	</div>
</div>
<p style='margin:0;font-size:1px;line-height:1px;height:1px;'>&nbsp;</p>