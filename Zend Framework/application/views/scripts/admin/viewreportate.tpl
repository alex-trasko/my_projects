<style type="text/css">
    .report_td{border-top:1px #000 solid;border-left:1px #000 solid;font-size:12px;color:#000;}
    .report_td td{padding:10px;border-right:1px #000 solid;border-bottom:1px #000 solid;text-align:left;}
</style>
<script src="/js/jquery.printElement.js" type="text/javascript"></script>
<script type="text/javascript">
	function subm()
	{
		$("#zapros_form").submit();
	}
	function printview()
	{	
		$('#print_ate').printElement();
	}
	function exportdata()
	{
	if(confirm("Экспорт метаданных может занять несколько минут!  Вы точно желаете продолжить?"))
		document.location='/exportreportate';		
	}
</script>
<div style="border:1px solid #C9C9C9; margin-bottom:20px;">
    <div id="top_news">
    	<div style="font-size:12px; color:#254074; text-align:center; padding-top:8px;">
        	<?php echo($this->title['top']); ?>
        </div>
    </div>
    <div id="print_ate" style="padding:20px 20px 20px 20px;  background-color:#FFF;">
        <div style="margin-bottom:10px;">
            <div style="margin-top:30px; text-align:center; font-weight:bold; text-decoration:underline;">Государственный каталог наименований географических объектов Республики Беларусь</div>
            <div style="margin-top:30px; text-align:center; font-weight:bold;"><?php echo(mb_strtoupper($this->title['doc'], 'UTF-8')); ?></div>
            <?php if ($this->obl != '') { ?>
                <div style="margin-top:25px; text-align:center;"><?php echo($this->obl); ?></div>
                <div style="margin-top:10px; text-align:center; font-weight:bold;"><?php echo($this->ra); ?></div>
                <div style="margin-top:10px; text-align:center; font-weight:bold;"><?php echo($this->sovet); ?></div>
            <?php } else { ?>    
                <div style="margin-top:25px; text-align:center;"><?php echo('РЕСПУБЛИКА БЕЛАРУСЬ'); ?></div>
            <?php } ?>
        </div>
        
        <?php if ($this->report_type == 1) { ?>
        <table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="report_td">
            <tr>
                <td style="width:60px;text-align:center;">№ п/п</td>
                <td style="width:300px;text-align:center;">Название совета</td>
                <td style="width:300px;text-align:center;">Административный центр</td>
                <td style="width:300px;text-align:center;">Кол-во н.п.</td>
            </tr>
            <?php $n=1; 
                foreach($this->report as $item) { ?>
            <tr>
                <td style="width:60px;"><?php echo($n); ?></td>
                <td style="width:300px;">
                    <?php 
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                        echo(' '.$item['RATECUT']);
                    ?>
                </td>
                <td style="width:300px;"><?php echo($item['ADMINCENTE']); ?></td>
                <td style="width:300px;"><?php echo($item['KOL']); ?></td>
            </tr>
            <?php $n++; } ?>           
        </table>
        <?php } ?>
        
        <?php if ($this->report_type == 2) { ?>
        <table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="report_td">
            <tr>
                <td style="width:60px;text-align:center;">№ п/п</td>
                <td style="width:100px;text-align:center;">Тип</td>
                <td style="width:200px;text-align:center;">Название (Рус.)</td>
                <td style="width:200px;text-align:center;">Название (Бел.)</td>
                <td style="width:200px;text-align:center;">Название совета</td>
                <td style="width:100px;text-align:center;">Номенклатура</td>
                <td style="width:100px;text-align:center;">Кол-во жителей</td>
            </tr>
            <?php $n=1; 
                foreach($this->report as $item) { ?>
            <tr>
                <td style="width:60px;"><?php echo($n); ?></td>
                <td style="width:100px;"><?php echo($item['RATECUT']); ?></td>
                <td style="width:200px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                    ?>
                </td>
                <td style="width:200px;">
                    <?php
                        $PrintName->printname($item['NAMEBEL'], $item['UDARBEL']);
                    ?>
                </td> 
                <td style="width:200px;"><?php echo($item['SOVET']); ?></td>
                <td style="width:100px;"><?php echo($item['NOMENKLAT']); ?></td>
                <td style="width:100px;"><?php echo($item['POPULAR']); ?></td>
            </tr>
            <?php $n++; } ?>           
        </table>
        <?php } ?>
        
        <?php if ($this->report_type == 3) { ?>
        <table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="report_td">
            <tr>
                <td style="width:60px;text-align:center;">№ п/п</td>
                <td style="width:100px;text-align:center;">Тип</td>
                <td style="width:200px;text-align:center;">Название (Рус.)</td>
                <td style="width:100px;text-align:center;">Источник (Рус.)</td>
                <td style="width:200px;text-align:center;">Название (Бел.)</td>
                <td style="width:100px;text-align:center;">Источник (Бел.)</td>
                <td style="width:200px;text-align:center;">Название совета</td>
            </tr>
            <?php $n=1; 
                foreach($this->report as $item) { ?>
            <tr>
                <td style="width:60px;"><?php echo($n); ?></td>
                <td style="width:100px;"><?php echo($item['RATECUT']); ?></td>
                <td style="width:200px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                    ?>
                </td>
                <td style="width:100px;"><?php echo($item['SINFORUS']); ?></td>
                <td style="width:200px;">
                    <?php
                        $PrintName->printname($item['NAMEBEL'], $item['UDARBEL']);
                    ?>
                </td>
                <td style="width:100px;"><?php echo($item['SINFOBEL']); ?></td>
                <td style="width:200px;"><?php echo($item['SOVET']); ?></td>
            </tr>
            <?php $n++; } ?>           
        </table>
        <?php } ?>
        
        <?php if ($this->report_type == 4) { ?>
        <table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="report_td">
            <tr>
                <td style="width:60px;text-align:center;">№ п/п</td>
                <td style="width:250px;text-align:center;">Название совета (Рус.)</td>
                <td style="width:250px;text-align:center;">Название совета (Бел.)</td>
                <td style="width:250px;text-align:center;">Административный центр</td>
                <td style="width:150px;text-align:center;">Кол-во н.п.</td>

            </tr>
            <?php $n=1; 
                foreach($this->report as $item) { ?>
            <tr>
                <td style="width:60px;"><?php echo($n); ?></td>
                <td style="width:250px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                        echo(' '.$item['RATECUT']);
                    ?>
                </td>
                <td style="width:250px;">
                    <?php
                        $PrintName->printname($item['NAMEBEL'], $item['UDARBEL']);
                        echo(' '.$item['RATECUT']);
                    ?>
                </td>
                <td style="width:250px;"><?php echo($item['ADMINCENTE']); ?></td>
                <td style="width:150px;"><?php echo($item['KOL']); ?></td>
            </tr>
            <?php $n++; } ?>           
        </table>
        <?php } ?>
        
        <?php if ($this->report_type == 5) { ?>
        <table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="report_td">
            <tr>
                <td style="width:60px;text-align:center;">№ п/п</td>
                <td style="width:225px;text-align:center;">Название АТЕ</td>
                <td style="width:225px;text-align:center;">Название (Рус.)</td>
                <td style="width:225px;text-align:center;">Название (Бел.)</td>
                <td style="width:225px;text-align:center;">Название совета</td>
            </tr>
            <?php $n=1; 
                foreach($this->report as $item) { ?>
            <tr>
                <td style="width:60px;"><?php echo($n); ?></td>
                <td style="width:225px;"><?php echo($item['ATENAME']); ?></td>
                <td style="width:225px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                    ?>
                </td>
                <td style="width:225px;">
                    <?php
                        $PrintName->printname($item['NAMEBEL'], $item['UDARBEL']);
                    ?>
                </td>
                <td style="width:225px;"><?php echo($item['SOVET']); ?></td>
            </tr>
            <?php $n++; } ?>           
        </table>
        <?php } ?>
        
        <?php if ($this->report_type == 6) { ?>
        <table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="report_td">
            <tr>
                <td style="width:110px;text-align:center;">№ п/п</td>
                <td style="width:150px;text-align:center;">Тип</td>
                <td style="width:250px;text-align:center;">Название (Рус.)</td>               
                <td style="width:250px;text-align:center;">Название (Бел.)</td>
                <td style="width:200px;text-align:center;">Название совета</td>
            </tr>
            <?php $n=1; 
                foreach($this->report as $item) { ?>
            <tr>
                <td style="width:110px;"><?php echo($n); ?></td>
                <td style="width:150px;"><?php echo($item['RATECUT']); ?></td>
                <td style="width:250px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                    ?>
                </td>
                <td style="width:250px;">
                    <?php
                        $PrintName->printname($item['NAMEBEL'], $item['UDARBEL']);
                    ?>
                </td>
                <td style="width:200px;"><?php echo($item['SOVET']); ?></td>
            </tr>
            <?php $n++; } ?>           
        </table>
        <?php } ?>
        
        <?php if ($this->report_type == 7) { ?>
         <table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="report_td">
            <tr>
                <td style="width:60px;text-align:center;">№ п/п</td>
                <td style="width:200px;text-align:center;">Тип</td>
                <td style="width:250px;text-align:center;">Название (Рус.)</td>
                <td style="width:250px;text-align:center;">Название совета</td>
                <td style="width:200px;text-align:center;">Номенклатура</td>
            </tr>
            <?php $n=1; 
                foreach($this->report as $item) { ?>
            <tr>
                <td style="width:60px;"><?php echo($n); ?></td>
                <td style="width:200px;"><?php echo($item['RATECUT']); ?></td>
                <td style="width:250px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                    ?>
                </td>
                <td style="width:250px;"><?php echo($item['SOVET']); ?></td>
                <td style="width:200px;"><?php echo($item['NOMENKLAT']); ?></td>
            </tr>
            <?php $n++; } ?>           
        </table>
        <?php } ?>
        
        <!--<?php echo("<pre>"); print_r($this->title); ?>
        <?php echo("<pre>"); print_r($this->rezult); ?>-->
        
	</div>
</div>
<form id="#zapros_form" method="post" action="/exportreportate" enctype="multipart/form-data" style="margin-bottom:10px; height:24px;">
	<input type="hidden" name="obl" value="<?php echo($this->zapros['obl']); ?>" />
    <input type="hidden" name="ra" value="<?php echo($this->zapros['ra']); ?>" />
    <input type="hidden" name="sovet" value="<?php echo($this->zapros['sovet']); ?>" />
    <input type="hidden" name="existence" value="<?php echo($this->zapros['existence']); ?>" />
    <input type="hidden" name="report" value="<?php echo($this->zapros['report']); ?>" />
    <input style="float:left" type="button" onclick="document.location='/reportsate'" value="Назад"/>
    <input style="float:right;" onclick="printview()" type="button" value="Раcпечатать"/>
    <input style="float:right; margin-right:10px;" type="submit" name="zapros" value="Экспорт данных"/>
</form>