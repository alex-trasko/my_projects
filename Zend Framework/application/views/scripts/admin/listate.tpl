<!--Search-->
<style type="text/css">
    #tb_searchate tr td{ padding:5px 5px 5px 5px; }
	
    #search_form ul { height: 300px; overflow: auto; width: 100px; border: 1px solid #000; }
    #search_form ul { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
    #search_form li { margin: 0; padding: 0; }
    #search_form label { display: block; color: WindowText; background-color: Window; margin: 0; padding: 0; width: 100%; }
    #search_form label:hover { background-color: Highlight; color: HighlightText; }
	ul { list-style-type: none; margin: 0; padding: 0; }
    .variant_s{ padding:2px; background-color:#FFF; }
    .chet_variant_s{ background-color:#EEE; }
</style>
<style type="text/css">@import url(/js/calendar/skins/aqua/theme.css);</style>
<script src="/js/jquery.printElement.js" type="text/javascript"></script>
<script type="text/javascript">
function printrezult()
{	
	$('#search_rezult').printElement();
}
function ajaxselectrasearchate()
{
	id = $("#obl").val();
	$.ajax({  
	    url: "/selectrasearchate",  
	    cache: false, 
	    type: "POST",
	    data: "oblid="+id,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_ra").html(html);
			ajaxselectsovetsearch(); 
	    }  
	});
}
function ajaxselectsovetsearch()
{
	id = $("#ra").val();
	$.ajax({  
	    url: "/selectsovetsearch",  
	    cache: false, 
	    type: "POST",
	    data: "raid="+id,
	    dataType: "html",
	    success: function(html){
	        //alert(html);
	        $("#div_sovet").html(html); 
	    }  
	});
}
$(document).ready(function() { 	
	$("#namerus").bind("keyup", function(){
		val = $('#namerus').val();
		if(val!='')
		{
			var table = 'KN_dbate';
			var field = 'NAMERUS';
			var input = 'namerus';
			$('#'+input).css({'background':'white url("/img/map/indicator.gif") right center no-repeat'});
			$.ajax({ 
				url: "/suggest",  
				cache: false, 
				type: "POST",
				data: "table="+table+"&field="+field+"&word="+val+"&input="+input,
				dataType: "html",
				success: function(html){
					//alert(html);
					$("#sug_ul").css({"top":$('#'+input).offset().top+22,"left":$('#'+input).offset().left });
					$("#sug_ul").html(html);
					$(".ac_results").css({'display':'block'});
					$(".ac_results").css({'border':'1px solid #000000','border-top':'none'});
					$('#'+input).css({'background':'#FFF'});
				}  
			});
		}
	});	
});
$(document).ready(function() { 	
	$("#namebel").bind("keyup", function(){
		val = $('#namebel').val();
		if(val!='')
		{
			var table = 'KN_dbate';
			var field = 'NAMEBEL';
			var input = 'namebel';
			$('#'+input).css({'background':'white url("/img/map/indicator.gif") right center no-repeat'});
			$.ajax({  
				url: "/suggest",  
				cache: false, 
				type: "POST",
				data: "table="+table+"&field="+field+"&word="+val+"&input="+input,
				dataType: "html",
				success: function(html){
					//alert(html);
					$("#sug_ul").css({"top":$('#'+input).offset().top+22,"left":$('#'+input).offset().left });
					$("#sug_ul").html(html);
					$(".ac_results").css({'display':'block'});
					$(".ac_results").css({'border':'1px solid #000000','border-top':'none'});
					$('#'+input).css({'background':'#FFF'});
				}  
			});
		}
	});	
});
function searchate(sorting)
{
	$("#search_sorting").val(sorting);
	$("#search_form").submit();
}
function rodate_up()
{
	$("#rodate_ul").css({'display':'block'});
}

function rodate_down()
{
	$("#rodate_ul").css({'display':'none'});
}
</script>
<!--EndSearch-->


<script type="text/javascript">
function subm(sorting)
{
	$("#pages_form").submit();
}
function listate(sorting)
{
	$("#pages_sorting").val(sorting);
	subm();
}
function exportdata()
{
	if(confirm("Экспорт метаданных может занять несколько минут!  Вы точно желаете продолжить?"))
		document.location='/exportate';		
}
function search_up()
{
	$("#search_form").css({'display':'block'});
}
</script>

<div id="sug_ul" style="position:absolute; top:0; left:0; z-index:1500; width:305px;">
    <ul class="ac_results" style="max-height:250px;overflow:auto; display:none;">        	
        <li class="variant_s"></li>
    </ul>
</div>

<div style="border:1px solid #C9C9C9; margin-bottom:20px;">
    <div id="top_news">
                <div style="font-size:12px; color:#254074; text-align:center; padding-top:8px;">АТЕ и ТЕ (dbate)</div>
    </div>
    <div style="padding:20px 20px 20px 20px; background-color:#FFF;">
    
        <form id="search_form" style="width:710px;  margin:0 0 20px 120px; border:1px solid #C9C9C9; background-color:#FBFBFB; <?php echo (!($this->search_rezult))? 'display:none;':''?>" method="post" action="/listate" enctype="multipart/form-data">
			<div style="width:640px; margin:20px 30px 20px 30px; font-size:12px;">
                <table id="tb_searchate" style="width:100%;" cellpadding="0" cellspacing="0" border="0">
 					<tr>
                    	<td>Название (Рус.):</td>
                        <td><input type="text" value='<?php echo($this->atedata['namerus']); ?>' id="namerus" name="namerus" style="width:300px; float:right;" autocomplete="off" /></td>
                    </tr>
                    <tr>
                    	<td>Название (Бел.):</td>
                        <td><input type="text" value='<?php echo($this->atedata['namebel']); ?>' id="namebel" name="namebel" style="width:300px; float:right;" autocomplete="off" /></td>
                    </tr>
                    <tr>
                    	<td>Название (Лат.):</td>
                        <td><input type="text" value='<?php echo($this->atedata['namelat']); ?>' id="namelat" name="namelat" style="width:300px; float:right;" /></td>
                    </tr>
                    <tr>
                    	<td>Код СОАТО:</td>
                        <td><input type="text" value='<?php echo($this->atedata['soato']); ?>' id="soato" name="soato" style="width:300px; float:right;" /></td>
                    </tr>
                    <tr>
                    	<td>Род объекта:</td>
                        <td style="width:305px;">
                            <div id="rodate_ul" style="z-index:99; background-color:#999; padding:5px 5px 5px 5px; position:absolute; display:none;">
                                <ul style="width:294px;  margin-top:5px;">
                                <?php $rodate = explode(',', $this->atedata['rodate']); $length = count($rodate);
                                foreach($this->KN_rodate as $item) { ?>
                                    <li><label for="rodate[<?php echo($item['ID_RODATE']); ?>]">
                                    <input type="checkbox" <?php  for($i=0; $i<$length; $i++){ echo ($rodate[$i] == $item['ID_RODATE'])? 'checked="checked"':''; } ?> name="rodate[<?php echo($item['ID_RODATE']); ?>]" value='<?php echo($item['ID_RODATE']); ?>' ><?php echo($item['RATECUT']); ?></label></li>
                                <?php } ?>                                                  
                                </ul>
                                <input onclick="rodate_down()" style="float:right; margin-right:10px;" type="button" value="ОК" />
                            </div>
                            <select style="width:305px; float:right;" id="rodate" onfocus="rodate_up()">
                                <option value="" selected="selected" /></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td>Существование:</td>
                        <td>                    
                            <select name="existence" id="existence" style="width:305px; float:right;">
                            	<option value="" ></option>
                                <option <?php echo ($this->atedata['existence'] == "существует")? 'selected="selected"':'' ?> value="существует" >существует</option> 
                                <option <?php echo ($this->atedata['existence'] == "не существует")? 'selected="selected"':'' ?> value="не существует" >не существует</option> 
                            </select>                            
                        </td>
                    </tr>
                    <tr>
                    	<td>Область:</td>
                        <td>
                            <select style="width:305px; float:right;" name="obl" id="obl" onchange="ajaxselectrasearchate();">
                            	<option value=""></option>
                                <?php foreach($this->KN_obl as $item) { ?>
                                <option <?php echo ($this->atedata['obl'] == $item['ID_OBL'])? 'selected="selected"':'' ?> value='<?php echo($item['ID_OBL']); ?>'><?php echo($item['OBL']); ?></option>
                                <?php } ?>
                            </select>  
                        </td>
                    </tr>
                    <tr>
                    	<td>Район:</td>
                        <td id="div_ra">
                            <select style="width:305px; float:right;" name="ra" id="ra" onchange="ajaxselectsovetsearch();">
                            	<option value=""></option>
                                <?php foreach($this->KN_ra as $item) 
                                    if(intval($item['ID_RA']/100)==$this->atedata['obl']){?>
                                <option <?php echo ($this->atedata['ra'] == $item['ID_RA'])? 'selected="selected"':'' ?> value='<?php echo($item['ID_RA']); ?>'><?php echo($item['RA']); ?></option>
                                <?php } ?>
                            </select>  
                        </td>
                    </tr>
                    <tr>
                    	<td>Советы:</td>
                        <td id="div_sovet">
                            <select style="width:305px; float:right;" name="sovet" id="sovet">
                                <option value=""></option>
                            	<?php foreach($this->KN_sovet as $item)
                                    if(intval($item['SOATO']/1000000000)*100+intval(fmod($item['SOATO'],100000000)/1000000) ==$this->atedata['ra']){?>
                                <option <?php echo ($this->atedata['sovet'] == $item['NAMERUS'].' '.$item['RATECUT'])? 'selected="selected"':'' ?>value="<?php echo($item['NAMERUS'].' '.$item['RATECUT']); ?>" ><?php echo($item['NAMERUS'].' '.$item['RATECUT']); ?></option>
                                <?php } ?>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                    	<td>Номенклатура:</td>
                        <td><input type="text" value='<?php echo($this->atedata['nomenklat']); ?>' id="nomenklat" name="nomenklat" style="width:300px; float:right;" /></td>
                    </tr>
                    <tr>
                    	<td>Численность (по категориям):</td>
                        <td>
                            <input type="text" value='<?php echo($this->atedata['popular_max']); ?>' id="popular_max" name="popular_max" style="width:100px; float:right;" />
                            <div style="width:45px; float:right; text-align:center; padding-top:2px;">До:</div>
                            <input type="text" value='<?php echo($this->atedata['popular_min']); ?>' id="popular_min" name="popular_min" style="width:100px; float:right;" />
                            <div style="width:45px; float:right; text-align:center; padding-top:2px;">От:</div>
                         </td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td>
                            <input style="float:right" type="submit" name="searchate" value="Искать" />
                            <input style="float:right" type="button" name="hide" value="Скрыть" onclick="document.location='<?php echo('/listate'); ?>';" />
                        </td>
                    </tr>
                </table>
            </div>
            <input type="hidden" id="search_sorting" name="sorting" value="KOD_ATE" />
        </form>
        
        <?php if($this->search_rezult) { ?>        
        <div style="font-size:16px; color:#254074; margin-bottom:20px;">РЕЗУЛЬТАТЫ ПОИСКА</div>
        
        <table id="admdb_td" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
            <tr>
                <td style="width:90px; cursor:pointer;" onclick="searchate('KOD_ATE');">KOD_ATE</td>
                <td style="width:135px; cursor:pointer;" onclick="searchate('ATENAME');">АТЕ (Реестр НКА)</td>
                <td style="width:135px; cursor:pointer;" onclick="searchate('NAMERUS');">Название (Рус.)</td>
                <td style="width:135px; cursor:pointer;" onclick="searchate('NAMEBEL');">Название (Бел.)</td>
                <td style="width:40px; cursor:pointer;" onclick="searchate('RATECUT');">Род</td>
                <td style="width:95px; cursor:pointer;" onclick="searchate('EXISTENCE');">Существование</td>
                <td style="width:135px; cursor:pointer;" onclick="searchate('NAME_OBL');">Область</td>
                <td style="width:135px; cursor:pointer;" onclick="searchate('NAME_RA');">Район</td>
                <td style="width:100px;">Подробнее</td>
            </tr>
            <tr>
                <td colspan="9" style="height:1px; background-color:#2a4984;"></td>
            </tr>
            <?php $color=2; 
                foreach($this->search_rezult as $item) { ?>
            <tr style="<?php if($color%2 == 0) echo('background-color:#e7f9fb;'); else echo('background-color:#fff;'); ?>" class="admdb_td  <?php if($item['EXISTENCE']== 'не существует') echo('no_exist')?>" >
                <td style="width:90px;"><?php echo($item['KOD_ATE']); ?></td>
                <td style="width:135px;<?php if($item['ATENAME']!= $item['NAMERUS']) echo('color:#F0F;')?>"><?php echo($item['ATENAME']); ?></td>
                <td style="width:135px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                    ?>
                </td>
                <td style="width:135px;">
                    <?php
                        $PrintName->printname($item['NAMEBEL'], $item['UDARBEL']);
                    ?>
                </td>
                <td style="width:40px;"><?php echo($item['RATECUT']); ?></td>
                <td style="width:95px;"><?php echo($item['EXISTENCE']); ?></td>
                <td style="width:135px;"><?php echo($item['NAME_OBL']); ?></td>
                <td style="width:135px;"><?php echo($item['NAME_RA']); ?></td>
                <td style="width:100px; font-size:10px;">
                    <a href="/editate/<?php echo($item['ID']); ?>">Редактировать</a>
                </td>
            </tr>
            <?php $color++; } ?>
            <tr>
                <td colspan="9" style="height:1px; background-color:#2a4984;"></td>
            </tr>            
        </table>
            
        <!--<?php echo("<pre>"); print_r($this->search_rezult); ?>-->
        
        <?php } else { if ($this->atelist){ ?>
        
        <div>
            <div style="float:left;"><div style="float:left; font-size:12px;">(<?php echo($this->kol); ?>) По 50 записей, на странице.&nbsp;&nbsp;&nbsp; Номер страницы:&nbsp;</div>
                <form  id="pages_form" style="float:left;" method="post" action="/listate" enctype="multipart/form-data">
                    <select onchange="subm();" style="width:70px;" name="page" id="page">
                         <?php for($i=1; $i<=$this->pagescount; $i++ ) { ?>
                                <option  value="<?php echo($i); ?>" <?php echo($this->pages == $i)? 'selected="selected"':'' ?>><?php echo($i); ?></option>
                         <?php } ?>
                    </select>
                    <input type="hidden" id="pages_sorting" name="sorting" value="<?php echo($this->sorting); ?>" />
                </form>
            </div>        	
                <input style="float:right; margin-bottom:20px;" type="button" value="Добавить запись" onclick="document.location='/editate/0'"/>
                <input style="float:right; margin-bottom:20px;" type="button" value="Импорт данных" onclick="document.location='/importate'"/>
                <input style="float:right; margin-bottom:20px;" type="button" value="Экспорт данных" onclick="exportdata()" />
                <input style="float:right; margin-bottom:20px;" type="button" value="Поиск" onclick="search_up()" />
        </div>
        
        <table id="admdb_td" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
            <tr>
                <td style="width:90px; cursor:pointer;" onclick="listate('KOD_ATE');">KOD_ATE</td>
                <td style="width:135px; cursor:pointer;" onclick="listate('ATENAME');">АТЕ (Реестр НКА)</td>
                <td style="width:135px; cursor:pointer;" onclick="listate('NAMERUS');">Название (Рус.)</td>
                <td style="width:135px; cursor:pointer;" onclick="listate('NAMEBEL');">Название (Бел.)</td>
                <td style="width:40px; cursor:pointer;" onclick="listate('RATECUT');">Род</td>
                <td style="width:95px; cursor:pointer;" onclick="listate('EXISTENCE');">Существование</td>
                <td style="width:135px; cursor:pointer;" onclick="listate('NAME_OBL');">Область</td>
                <td style="width:135px; cursor:pointer;" onclick="listate('NAME_RA');">Район</td>
                <td style="width:100px;">Подробнее</td>
            </tr>
            <tr>
                <td colspan="9" style="height:1px; background-color:#2a4984;"></td>
            </tr>
            <?php $color=2; 
                foreach($this->atelist as $item) { ?>
            <tr style="<?php if($color%2 == 0) echo('background-color:#e7f9fb;'); else echo('background-color:#fff;'); ?>" class="admdb_td  <?php if($item['EXISTENCE']== 'не существует') echo('no_exist')?>" >
                <td style="width:90px;"><?php echo($item['KOD_ATE']); ?></td>
                <td style="width:135px;<?php if($item['ATENAME']!= $item['NAMERUS']) echo('color:#F0F;')?>"><?php echo($item['ATENAME']); ?></td>
                <td style="width:135px;">
                    <?php
                        $PrintName = new App_Util_PrintName ;
                        $PrintName->printname($item['NAMERUS'], $item['UDARRUS']);
                    ?>
                </td>
                <td style="width:135px;">
                    <?php
                        $PrintName->printname($item['NAMEBEL'], $item['UDARBEL']);
                    ?>
                </td>
                <td style="width:40px;"><?php echo($item['RATECUT']); ?></td>
                <td style="width:95px;"><?php echo($item['EXISTENCE']); ?></td>
                <td style="width:135px;"><?php echo($item['NAME_OBL']); ?></td>
                <td style="width:135px;"><?php echo($item['NAME_RA']); ?></td>
                <td style="width:100px; font-size:10px;">
                    <a href="/editate/<?php echo($item['ID']); ?>">Редактировать</a>
                </td>
            </tr>
            <?php $color++; } ?>
            <tr>
                <td colspan="9" style="height:1px; background-color:#2a4984;"></td>
            </tr>            
        </table>

        <!--<?php echo("<pre>"); print_r($this->atelist); ?>-->
        
        <?php }} ?>
        
        <div style="width:100%; margin-bottom:30px;">
            <input style="float:right; margin-top:10px;" type="button" name="return" value="Назад" onclick="document.location='<?php echo('/listkn'); ?>';" /> 
        </div>
    </div>
</div>