<?php
	$user = Zend_Auth::getInstance()->getIdentity();
?>
<style type="text/css">
.knd{
	padding:10px 10px 10px 10px;
	font-size:12px;
	border-bottom:1px solid #CCC;
	vertical-align:top;
}
</style>
<script src="/js/jquery.printElement.js" type="text/javascript"></script>
<script type="text/javascript">
	function printview()
	{	
		$('#print_ate').printElement();
	}
</script>

<div id="print_ate" style="border:1px solid #C9C9C9; margin-bottom:20px;">
    <div id="top_news">
    	<div style="font-size:12px; color:#254074; text-align:center; padding-top:8px;"><?php echo($this->atedata['ATENAME']); ?></div>
    </div>
    <div style="background-color:#FFF;">
        <div style="padding:20px 20px 20px 20px;">
            <table  style="width:100%; padding-bottom:10px;" cellpadding="0" cellspacing="0" border="0">
                <TR>
                	<TD class="knd" style="width:220px;">Учётный номер: </TD>
                    <TD class="knd"><?php echo($this->atedata['ID_ATE']); ?></TD>
                </TR>
                <?php if (isset($user)){ if($user->status == 2) {?>
                <TR>
                	<TD class="knd">Код СОАТО: </TD>
                    <TD class="knd"><?php echo($this->atedata['SOATO']); ?></TD>                                    
                </TR>
                <TR>
                	<TD class="knd">Дата регистрации: </TD>
                    <TD class="knd"><?php echo ($this->atedata['DATERЕG'])? date("d.m.Y", strtotime($this->atedata['DATERЕG'])) : $this->atedata['DATERЕG']; ?></TD>
                </TR>
                <?php }}?>
                <TR>
                	<TD class="knd">Название (Рус.): </TD>
                    <TD class="knd">
                        <?php
                            $PrintName = new App_Util_PrintName ;
                            $PrintName->printname($this->atedata['NAMERUS'], $this->atedata['UDARRUS']);
                        ?>
                    </TD>                                    
                </TR>
                <TR>
                	<TD class="knd">Название (Бел.): </TD>
                    <TD class="knd">
                        <?php
                            $PrintName->printname($this->atedata['NAMEBEL'], $this->atedata['UDARBEL']);
                        ?>
                    </TD>                                    
                </TR>
                <TR>
                	<TD class="knd">Название (Лат.): </TD>
                    <TD class="knd"><?php if (isset($user)) { if($user->status == 2) { $PrintName->printlat($this->atedata['NAMELAT']); }} else {echo('<font style="color:#999;">Скрыто</font>'); } ?></TD>
                </TR>
                <TR>
                	<TD class="knd">Род объекта: </TD>
                    <TD class="knd"><?php echo($this->atedata['RATENAME']); ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Существование: </TD>
                    <TD class="knd"><?php echo ($this->atedata['EXISTENCE']=='не существует')? '<font style="color:#090; font-weight:bold;">'.$this->atedata['EXISTENCE'].'</font>':$this->atedata['EXISTENCE']; ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Область: </TD>
                    <TD class="knd"><?php echo($this->atedata['NAME_OBL']); ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Район: </TD>
                    <TD class="knd"><?php echo($this->atedata['NAME_RA']); ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Советы: </TD>
                    <TD class="knd"><?php echo($this->atedata['SOVET']); ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Административный центр: </TD>
                    <TD class="knd"><?php echo($this->atedata['ADMINCENTE']); ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Административное значение: </TD>
                    <TD class="knd"><?php echo($this->atedata['NAMEVALUE']); ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Номенклатура: </TD>
                    <TD class="knd"><?php echo($this->atedata['NOMENKLAT']); ?></TD>
                </TR>
                <?php if (isset($user)){ if($user->status == 2) {?>
                <TR>
                    <TD class="knd">Источники (Бел.): </TD>
                    <TD class="knd"><?php foreach($this->atedata['SINFOBEL_M'] as $item) {  echo ($item.'<br />'); } ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Источники (Рус.): </TD>
                    <TD class="knd"><?php foreach($this->atedata['SINFORUS_M'] as $item) {  echo ($item.'<br />'); } ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Численность: </TD>
                    <TD class="knd">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <?php foreach($this->atedata['HPOPULAR'] as $item) { ?>
                                <TR>
                                    <TD style="width:150px;"><?php echo ($item["DATACENSUS"])? date("d.m.Y", strtotime($item["DATACENSUS"])) : $item["DATACENSUS"]; ?></TD>
                                    <TD style="width:250px; padding-left:10px;"><?php echo ($item["POPULAR"])? $item["POPULAR"].' чел.':'';?></TD>
                                </TR>
                            <?php } ?>
                        </table>
                    </TD>
                </TR>
                <?php }}?>
                <TR>
                    <TD class="knd">Вариант названия (Бел.): </TD>
                    <TD class="knd"><?php if(isset($this->atedata['DRTNAMEBEL']))foreach($this->atedata['DRTNAMEBEL'] as $item) { echo ($item['SINFOBEL']!='')? $item['DRTNAMEBEL'].' ('.$item['SINFOBEL'].')<br />' : $item['DRTNAMEBEL'].'<br />'; } ?></TD>
                </TR>
                <TR>
                    <TD class="knd">Вариант названия (Рус.): </TD>
                    <TD class="knd"><?php if(isset($this->atedata['DRTNAMERUS']))foreach($this->atedata['DRTNAMERUS'] as $item) { echo ($item['SINFORUS']!='')? $item['DRTNAMERUS'].' ('.$item['SINFORUS'].')<br />' : $item['DRTNAMERUS'].'<br />'; } ?></TD>
                </TR>
                <?php if (isset($user)){ if($user->status == 2) {?>
                <TR>
                    <TD class="knd">Изменение по объекту: </TD>
                    <TD class="knd">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <?php foreach($this->atedata['HCHANGE'] as $item) { ?>
                                <TR style="vertical-align:top;">
                                    <TD style="width:150px;"><?php echo ($item["REDATE"])? date("d.m.Y", strtotime($item["REDATE"])) : $item["REDATE"]; ?></TD>
                                    <TD style="width:350px; padding-left:10px;"><?php echo ($item["CHANGES"]);?></TD>
                                    <TD style="width:150px; padding-left:10px;"><a style="color:#2a4984;" href="<?php echo ($item["HYPERLINK"]);?>"><?php echo ($item["HYPERLINK"]);?></TD>
                                </TR>
                            <?php } ?>
                        </table>
                    </TD>
                </TR>
                <TR>
                    <TD class="knd">Координаты: </TD>
                    <TD class="knd">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <TR>
                                <TD style="width:150px;"><?php echo("X: ".$this->atedata['X_WGS']); ?></TD>
                                <TD style="width:150px; padding-left:10px;"><?php echo(" Y: ".$this->atedata['Y_WGS']); ?></TD>
                            </TR>
                        </table>
                    </TD>
                </TR>
                <?php }}?>
            </table>
        </div>    
    </div>
</div>
<div style="height:24px; margin-bottom:20px;">
    <input style="float:left" type="button" value="Назад" onclick="document.location='/searchate'"/>
    <input style="float:right;" type="button" value="Раcпечатать" onclick="printview()"/>
    <?php if (isset($user)){ if($user->status == 2) {?>
    <input style="float:right;" type="button" name="return" value="Редактировать" onclick="document.location='<?php echo('/editate/'.$this->atedata['ID']); ?>';" />
    <?php }} ?>
</div>