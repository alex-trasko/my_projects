<style type="text/css">
   ul { height: 300px; overflow: auto; width: 100px; border: 1px solid #000; }
   ul { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
   li { margin: 0; padding: 0; }
   label { display: block; color: WindowText; background-color: Window; margin: 0; padding: 0; width: 100%; }
   label:hover { background-color: Highlight; color: HighlightText; }
</style>
<script type="text/javascript">

function sinfobel_up()
{
	$("#sinfobel_ul").css({'display':'block'});
}

function sinfobel_down()
{
	$("#sinfobel_ul").css({'display':'none'});
}

function sinforus_up()
{
	$("#sinforus_ul").css({'display':'block'});
}

function sinforus_down()
{
	$("#sinforus_ul").css({'display':'none'});
}

function dr_sinfobel_up()
{
	$("#dr_sinfobel_ul").css({'display':'block'});
}

function dr_sinfobel_down()
{
	$("#dr_sinfobel_ul").css({'display':'none'});
}

function dr_sinforus_up()
{
	$("#dr_sinforus_ul").css({'display':'block'});
}

function dr_sinforus_down()
{
	$("#dr_sinforus_ul").css({'display':'none'});
}

function del()
{
	if(confirm("Вы точно желаете удалить запись?"))
		document.location="/delate/<?php echo($this->id); ?>";		
}

$(document).ready(function() {
<?php if($this->errors) foreach($this->errors as $error) { ?>
	$('<?php echo("#".$error); ?>').css({'border':'1px solid red'});
<?php } ?>
});

function change() 
{
    document.getElementById("namelat").value = translit(document.getElementById("namebel").value); 
}

function ajaxselectraate()
{
	id = $("#obl").val();
	$.ajax({  
	    url: "/selectraate",  
	    cache: false, 
	    type: "POST",
	    data: "oblid="+id,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_ra").html(html);
			ajaxselectsovet(); 
	    }  
	});
}
function ajaxselectsovet()
{
	id = $("#ra").val();
	$.ajax({  
	    url: "/selectsovet",  
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

function ajaxgetnomenklat()
{
	x = $("#x_wgs").val();
	y = $("#y_wgs").val();
	$.ajax({  
	    url: "/getnomenklat",  
	    cache: false, 
	    type: "POST",
	    data: "x="+x+"&y="+y,
	    dataType: "html",
	    success: function(html){
			//alert(html);
	        $("#div_nomenklat").html(html); 
	    }  
	});
}

function ajaxatelisthpopular(type, id, kod_ate)
{
	dat = "id="+id+"&type="+type+"&kod_ate="+kod_ate;
	if (type == 'save'){	
		popular = $("#hpopular_popular").val();
		datacensus = $("#hpopular_datacensus").val();
		dat = dat+"&popular="+popular+"&datacensus="+datacensus;
	}
	$.ajax({  
	    url: "/atelisthpopular",  
	    cache: false, 
	    type: "POST",
	    data: dat,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_hpopular").html(html); 
	    }  
	});
}

function ajaxateedithpopular(id, kod_ate)
{
	$.ajax({  
	    url: "/ateedithpopular",  
	    cache: false, 
	    type: "POST",
	    data: "id="+id+"&kod_ate="+kod_ate,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_hpopular").html(html); 
	    }  
	});
}

function ajaxatelistatedrtnamebel(type, id, kod_ate)
{
	dat = "id="+id+"&type="+type+"&kod_ate="+kod_ate;
	if (type == 'save'){	
		drtnamebel = $("#atedrtnamebel_drtnamebel").val();
		var i = 0;
		var mas = new Array;
		var mc = $("input[name='dr_sinfobel']:checked");
		mc.each(function() {
			mas[i] = $(this).val();
			i++;
		});
		sinfobel = mas.join(',');
		dat = dat+"&drtnamebel="+drtnamebel+"&sinfobel="+sinfobel;
	}
	$.ajax({  
	    url: "/atelistatedrtnamebel",  
	    cache: false, 
	    type: "POST",
	    data: dat,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_atedrtnamebel").html(html); 
	    }  
	});
}

function ajaxateeditatedrtnamebel(id, kod_ate)
{
	$.ajax({  
	    url: "/ateeditatedrtnamebel",  
	    cache: false, 
	    type: "POST",
	    data: "id="+id+"&kod_ate="+kod_ate,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_atedrtnamebel").html(html); 
	    }  
	});
}

function ajaxatelistatedrtnamerus(type, id, kod_ate)
{
	dat = "id="+id+"&type="+type+"&kod_ate="+kod_ate;
	if (type == 'save'){
		drtnamerus = $("#atedrtnamerus_drtnamerus").val();
		var i = 0;
		var mas = new Array;
		var mc = $("input[name='dr_sinforus']:checked");
		mc.each(function() {
			mas[i] = $(this).val();
			i++;
		});
		sinforus = mas.join(',');
		dat = dat+"&drtnamerus="+drtnamerus+"&sinforus="+sinforus;
	}
	$.ajax({  
	    url: "/atelistatedrtnamerus",  
	    cache: false, 
	    type: "POST",
	    data: dat,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_atedrtnamerus").html(html); 
	    }  
	});
}

function ajaxateeditatedrtnamerus(id, kod_ate)
{
	$.ajax({  
	    url: "/ateeditatedrtnamerus",  
	    cache: false, 
	    type: "POST",
	    data: "id="+id+"&kod_ate="+kod_ate,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_atedrtnamerus").html(html); 
	    }  
	});
}

function ajaxatelisthchangeate(type, id, kod_ate)
{
	dat = "id="+id+"&type="+type+"&kod_ate="+kod_ate;
	if (type == 'save'){	
		
		redate = $("#hchangeate_redate").val();
		changes = $("#hchangeate_changes").val();
		namedoc = $("#hchangeate_namedoc").val();
		datedoc = $("#hchangeate_datedoc").val();
		inamebel = $("#hchangeate_inamebel").val();
		inamerus = $("#hchangeate_inamerus").val();
		hyperlink = $("#hchangeate_hyperlink").val();
		dat = dat+"&redate="+redate+"&changes="+changes+"&namedoc="+namedoc+"&datedoc="+datedoc+"&inamebel="+inamebel+"&inamerus="+inamerus+"&hyperlink="+hyperlink;
	}
	$.ajax({  
	    url: "/atelisthchangeate",  
	    cache: false, 
	    type: "POST",
	    data: dat,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_hchangeate").html(html); 
	    }  
	});
}

function ajaxateedithchangeate(id, kod_ate)
{
	$.ajax({  
	    url: "/ateedithchangeate",  
	    cache: false, 
	    type: "POST",
	    data: "id="+id+"&kod_ate="+kod_ate,
	    dataType: "html",
	    success: function(html){
		    //alert(html);
	        $("#div_hchangeate").html(html); 
	    }  
	});
}

</script>
<style type="text/css">@import url(/js/calendar/skins/aqua/theme.css);</style>
<script type="text/javascript" src="/js/calendar/calendar.js"></script>
<script type="text/javascript" src="/js/calendar/lang/calendar-ru.js"></script>
<script type="text/javascript" src="/js/calendar/calendar-setup.js"></script>
<script type="text/javascript" src="/js/translit.js"></script>
<div style="border:1px solid #C9C9C9; margin-bottom:20px;">
    <div id="top_news">
    	<div style="font-size:12px; color:#254074; text-align:center; padding-top:8px;">
        	Редактирование dbate
        </div>
    </div>
    <div style="padding:20px 20px 20px 20px; font-size:12px;  background-color:#FFF;">
 		<form style="width:700px;  margin-left:120px; border:1px solid #C9C9C9; background-color:#FBFBFB;" method="post" action="/editate/<?php echo($this->id); ?>" enctype="multipart/form-data">
			<div style="width:640px; margin:20px 30px 20px 30px;">
            	<!--<div style="margin-bottom:5px;">Информация об АТЕ:</div>
                <div style="border:1px solid #C9C9C9; padding:20px 20px 20px 20px;">-->
                	<div style="padding:5px 0px 5px 0px; height:20px;">Учётный номер:
                    	<input type="text" value="<?php echo($this->atedata['ID_ATE']) ?>" id="id_ate" name="id_ate" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;"> Код АТЕ:
                    	<input type="text" value="<?php echo($this->atedata['KOD_ATE']) ?>" id="kod_ate" name="kod_ate" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Дата регистрации:
                    	<input type="text" value="<?php echo ($this->atedata['DATERЕG'])? date("d.m.Y", strtotime($this->atedata['DATERЕG'])) : $this->atedata['DATERЕG']; ?>" id="datereg" name="datereg" style="width:300px; float:right;" />
                        <script type="text/javascript">
							Calendar.setup(
							{
								inputField  : "datereg",
								ifFormat    : "%d.%m.%Y",
								button      : "datereg",
								firstDay    : 1
							}
							);
                        </script>
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Название АТЕ:
                    	<input type="text" value="<?php echo($this->atedata['ATENAME']) ?>" id="atename" name="atename" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Название (Рус.):
                    	<input type="text" value="<?php echo($this->atedata['NAMERUS']) ?>" id="namerus" name="namerus" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Ударение Название (Рус.):
                    	<input type="text" value="<?php echo($this->atedata['UDARRUS']) ?>" id="udarrus" name="udarrus" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Название (Бел.):
                    	<input type="text" onChange="change();" value="<?php echo($this->atedata['NAMEBEL']) ?>" id="namebel" name="namebel" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Ударение Название (Бел.):
                    	<input type="text" value="<?php echo($this->atedata['UDARBEL']) ?>" id="udarbel" name="udarbel" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Название (Лат.):
                    	<input type="text" value="<?php echo($this->atedata['NAMELAT']) ?>" id="namelat" name="namelat" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Код СОАТО:
                    	<input type="text" value="<?php echo($this->atedata['SOATO']) ?>" id="soato" name="soato" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Род объекта:
                    	<select style="width:305px; float:right;" name="id_rodate" id="id_rodate">
                    		<option value=""></option>
                            <?php foreach($this->KN_rodate as $item) { ?>
                    			<option value="<?php echo($item['ID_RODATE']); ?>" <?php echo ($this->atedata['ID_RODATE'] == $item['ID_RODATE'])? 'selected="selected"':'' ?>><?php echo($item['RATENAME']); ?></option>
                    		<?php } ?>
                    	</select> 
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Существование:
                        <select style="width:305px; float:right;" name="existence" id="existence">
                            <option value=""></option>
                            <option value="существует" <?php echo ($this->atedata['EXISTENCE'] == "существует")? 'selected="selected"':'' ?>>существует</option>
                            <option value="не существует" <?php echo ($this->atedata['EXISTENCE'] == "не существует")? 'selected="selected"':'' ?>>не существует</option>                   
                    	</select>
                    </div>                    
                    <div style="padding:5px 0px 5px 0px; height:20px;">Область:
                    	<select style="width:305px; float:right;" name="obl" id="obl" onchange="ajaxselectraate()">
                    		<option value=""></option>
                            <?php foreach($this->KN_obl as $item) { ?>
                    			<option value="<?php echo($item['ID_OBL']); ?>" <?php echo ($this->atedata['ID_OBL'] == $item['ID_OBL'])? 'selected="selected"':'' ?>><?php echo($item['OBL']); ?></option>
                    		<?php } ?>
                    	</select> 
                    </div>                
                    <div id="div_ra" style="padding:5px 0px 5px 0px; height:20px;">Район:
                    	<select style="width:305px; float:right;" name="ra" id="ra" onchange="ajaxselectsovet();">
                    		<option value=""></option>
                            <?php foreach($this->KN_ra as $item)
                            	if(intval($item['ID_RA']/100)==$this->atedata['ID_OBL']){?>
                    			<option value="<?php echo($item['ID_RA']); ?>" <?php echo ($this->atedata['ID_RA'] == $item['ID_RA'])? 'selected="selected"':'' ?>><?php echo($item['RA']); ?></option>
                    		<?php } ?>
                    	</select> 
                    </div>
                    <div id="div_sovet" style="padding:5px 0px 5px 0px; height:20px;">Советы:
                        <select style="width:305px; float:right;" name="sovet" id="sovet">
                            <option value=""></option>
                            <?php foreach($this->KN_sovet as $item)
                               if(intval($item['SOATO']/1000000000)*100+intval(fmod($item['SOATO'],100000000)/1000000)==$this->atedata['ID_RA']){?>
                               <option value="<?php echo($item['NAMERUS'].' '.$item['RATECUT']); ?>" <?php echo ($this->atedata['SOVET'] == $item['NAMERUS'].' '.$item['RATECUT'])? 'selected="selected"':'' ?>><?php echo ($item['NAMERUS'].' '.$item['RATECUT']); ?></option>
                            <?php } ?>
                        </select> 
                        
                        
                        <!--<input type="text" value="<?php echo($this->atedata['SOVET']) ?>" id="sovet" name="sovet" style="width:300px; float:right;" />-->
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Административный центр:
                    	<input type="text" value="<?php echo($this->atedata['ADMINCENTE']) ?>" id="admincente" name="admincente" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Административное значение:
                    	<select style="width:305px; float:right;" name="atevalue" id="atevalue">
                    		<option value=""></option>
                            <?php foreach($this->KN_atevalue as $item) { ?>
                    			<option value="<?php echo($item['ID_ATEVALUE']); ?>" <?php echo ($this->atedata['NAMEVALUE'] == $item['NAMEVALUE'])? 'selected="selected"':'' ?>><?php echo($item['NAMEVALUE']); ?></option>
                    		<?php } ?>
                    	</select> 
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Источники (Бел.):
                        <div style="width:305px; float:right;">
                            <div id="sinfobel_ul" style="z-index:99; background-color:#999; padding:5px 5px 5px 5px; position:absolute; top:455px; display:none;">
                                <ul style="width:292px;  margin-top:5px;">
                                <?php $mas_sinfobel = explode (",", $this->atedata['SINFOBEL']); $length = count($mas_sinfobel);
                                foreach($this->KN_sinfo as $item) { ?>
                                    <li><label for="sinfobel[<?php echo($item['ID_SINFO']); ?>]">
                                    <input type="checkbox" <?php  for($i=0; $i<$length; $i++){ echo ($mas_sinfobel[$i] == $item['ID_SINFO'])? 'checked="checked"':''; } ?> name="sinfobel[<?php echo($item['ID_SINFO']); ?>]" value='<?php echo($item['ID_SINFO']); ?>' ><?php echo($item['SINFONAME']); ?></label></li>
                                <?php } ?>                                                  
                                </ul>
                                <input onclick="sinfobel_down()" style="float:right; margin-right:10px;" type="button" value="ОК" />
                            </div>
                            <select id="sinfobel"  onfocus="sinfobel_up()" style="width:305px; float:right;">
                           		<option value="" selected="selected" /></option>
                            </select>
                        </div>
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Источники (Рус.):
                    	<div style="width:305px; float:right;">
                            <div id="sinforus_ul" style="z-index:99; background-color:#999; padding:5px 5px 5px 5px; position:absolute; top:480px; display:none;">
                                <ul style="width:292px;  margin-top:5px;">
                                <?php $mas_sinforus = explode (",", $this->atedata['SINFORUS']); $length = count($mas_sinforus);
                                foreach($this->KN_sinfo as $item) { ?>
                                    <li><label for="sinforus[<?php echo($item['ID_SINFO']); ?>]">
                                    <input type="checkbox" <?php  for($i=0; $i<$length; $i++){ echo ($mas_sinforus[$i] == $item['ID_SINFO'])? 'checked="checked"':''; } ?> name="sinforus[<?php echo($item['ID_SINFO']); ?>]" value='<?php echo($item['ID_SINFO']); ?>' ><?php echo($item['SINFONAME']); ?></label></li>
                                <?php } ?>                                                  
                                </ul>
                                <input onclick="sinforus_down()" style="float:right; margin-right:10px;" type="button" value="ОК" />
                            </div>
                            <select id="sinforus"  onfocus="sinforus_up()" style="width:305px; float:right;">
                           		<option value="" selected="selected" /></option>
                            </select>
                        </div>
                    </div>
                    <div id="div_nomenklat" style="padding:5px 0px 5px 0px; height:20px;">Номенклатура:
                    	<input type="text" value="<?php echo($this->atedata['NOMENKLAT']) ?>" id="nomenklat" name="nomenklat" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">Координаты:
                    	<input type="text" value="<?php echo($this->atedata['X_WGS']) ?>" id="x_wgs" name="x_wgs" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">
                    	<input type="text" value="<?php echo($this->atedata['Y_WGS']) ?>" id="y_wgs" name="y_wgs" style="width:300px; float:right;" />
                    </div>
                    <div style="padding:5px 0px 5px 0px; height:20px;">
                        <input type="button" value="Получить номенклатуру" onclick="ajaxgetnomenklat()" style="float:right;"/>
                    </div>
                <!--</div>-->                    
                    
                <div style="margin-bottom:5px; margin-top:10px;">Численность (вся история):</div>
                <div id="div_hpopular" style="border:1px solid #C9C9C9; padding:20px 20px 20px 20px;">
                    <?php if (!empty($this->atedata['HPOPULAR'])) { ?>                
                        <table id="users_td" style="color:#000; margin-bottom:10px;" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td style="width:200px;">Код АТЕ</td>
                                <td style="width:200px;">Численность</td>
                                <td style="width:200px;">Дата переписи</td>
                                <td style="width:200px;">Редактировать</td>
                                <td style="width:200px;">Удалить</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="height:1px; background-color:#2a4984;"></td>
                            </tr>
                            <?php $color=2; 
                                foreach($this->atedata['HPOPULAR'] as $item) { ?>
                            <tr style="<?php if($color%2 == 0) echo('background-color:#f5f5f5;'); else echo('background-color:#fff;'); ?>" class="user_td">               
                                <td style="width:200px;"><?php echo($item['KOD_ATE']); ?></td>
                                <td style="width:200px;"><?php echo($item['POPULAR']); ?></td>
                                <td style="width:200px;"><?php echo ($item['DATACENSUS'])? date("d.m.Y", strtotime($item['DATACENSUS'])) : $item['DATACENSUS']; ?></td>
                                <td style="width:200px; font-size:10px;">
                                    <input type="button" value="Редактировать" onclick="ajaxateedithpopular(<?php echo($item['ID'].', '.$this->atedata['KOD_ATE']); ?>)"/>                  
                                </td>
                                <td style="width:200px; font-size:10px;">
                                    <input type="button" value="Удалить" onclick="ajaxatelisthpopular('del',<?php echo($item['ID'].',' .$item['KOD_ATE']); ?>)"/>                  
                                </td>
                            </tr>
                            <?php $color++; } ?>
                            <tr>
                                <td colspan="5" style="height:1px; background-color:#2a4984;"></td>
                            </tr>            
                        </table>
                    <?php } ?>
                    <div style="margin-bottom:20px;">
                        <input style="float:right;" type="button" value="Добавить запись" onclick="ajaxateedithpopular(0,<?php echo($this->atedata['KOD_ATE']); ?>)"/>
                    </div>
                </div>
 
                <div style="margin-bottom:5px; margin-top:10px;">Варианты названий(Бел.):</div>
                <div id="div_atedrtnamebel" style="border:1px solid #C9C9C9; padding:20px 20px 20px 20px;">
                    <?php if (!empty($this->atedata['DRTNAMEBEL'])) { ?>
                    	<table id="users_td" style="width:100%; color:#000; margin-bottom:10px;" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="width:200px;">Код АТЕ</td>
                                <td style="width:200px;">Вариант названия</td>
                                <td style="width:200px;">Редактировать</td>
                                <td style="width:200px;">Удалить</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="height:1px; background-color:#2a4984;"></td>
                            </tr>
                            <?php $color=2; 
                                foreach($this->atedata['DRTNAMEBEL'] as $item) { ?>
                            <tr style="<?php if($color%2 == 0) echo('background-color:#f5f5f5;'); else echo('background-color:#fff;'); ?>" class="user_td">               
                                <td style="width:200px;"><?php echo($item['KOD_ATE']); ?></td>
                                <td style="width:200px;"><?php echo($item['DRTNAMEBEL']); ?></td>
                                <td style="width:200px; font-size:10px;">
                                    <input type="button" value="Редактировать" onclick="ajaxateeditatedrtnamebel(<?php echo($item['ID'].', '.$this->atedata['KOD_ATE']); ?>)"/>                   
                                </td>
                                <td style="width:200px; font-size:10px;">
                                    <input type="button" value="Удалить" onclick="ajaxatelistatedrtnamebel('del',<?php echo($item['ID'].',' .$item['KOD_ATE']); ?>)"/>                   
                                </td>
                            </tr>
                            <?php $color++; } ?>
                            <tr>
                                <td colspan="4" style="height:1px; background-color:#2a4984;"></td>
                            </tr>            
                        </table>
                    <?php } ?>
                    <div style="margin-bottom:20px;">
                        <input style="float:right;" type="button" value="Добавить запись" onclick="ajaxateeditatedrtnamebel(0,<?php echo($this->atedata['KOD_ATE']); ?>)"/>
                    </div>
                </div>
                
                <div style="margin-bottom:5px; margin-top:10px;">Варианты названий(Рус.):</div>
                <div id="div_atedrtnamerus" style="border:1px solid #C9C9C9; padding:20px 20px 20px 20px;">
                    <?php if (!empty($this->atedata['DRTNAMERUS'])) { ?>
                        <table id="users_td" style="width:100%; color:#000; margin-bottom:10px;" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="width:200px;">Код АТЕ</td>
                                <td style="width:200px;">Вариант названия</td>
                                <td style="width:200px;">Редактировать</td>
                                <td style="width:200px;">Удалить</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="height:1px; background-color:#2a4984;"></td>
                            </tr>
                            <?php $color=2; 
                                foreach($this->atedata['DRTNAMERUS'] as $item) { ?>
                            <tr style="<?php if($color%2 == 0) echo('background-color:#f5f5f5;'); else echo('background-color:#fff;'); ?>" class="user_td">               
                                <td style="width:200px;"><?php echo($item['KOD_ATE']); ?></td>
                                <td style="width:200px;"><?php echo($item['DRTNAMERUS']); ?></td>
                                <td style="width:200px; font-size:10px;">
                                    <input type="button" value="Редактировать" onclick="ajaxateeditatedrtnamerus(<?php echo($item['ID'].', '.$this->atedata['KOD_ATE']); ?>)"/>                   
                                </td>
                                <td style="width:200px; font-size:10px;">
                                    <input type="button" value="Удалить" onclick="ajaxatelistatedrtnamerus('del',<?php echo($item['ID'].',' .$item['KOD_ATE']); ?>)"/>                   
                                </td>
                            </tr>
                            <?php $color++; } ?>
                            <tr>
                                <td colspan="4" style="height:1px; background-color:#2a4984;"></td>
                            </tr>            
                        </table>
                    <?php } ?>
                    <div style="margin-bottom:20px;">
                        <input style="float:right;" type="button" value="Добавить запись" onclick="ajaxateeditatedrtnamerus(0,<?php echo($this->atedata['KOD_ATE']); ?>)"/>
                    </div>
                </div>
                
                <div style="margin-bottom:5px; margin-top:10px;">Изменение по обьекту:</div>
                <div id="div_hchangeate" style="border:1px solid #C9C9C9; padding:20px 20px 20px 20px;">
                    <?php if (!empty($this->atedata['HCHANGE'])) { ?>
                        <table id="users_td" style="width:100%; color:#000; margin-bottom:10px;" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="width:200px;">Код АТЕ</td>
                                <td style="width:200px;">Дата изменений</td>
                                <td style="width:200px;">Изменения</td>
                                <td style="width:200px;">Редактировать</td>
                                <td style="width:200px;">Удалить</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="height:1px; background-color:#2a4984;"></td>
                            </tr>
                            <?php $color=2; 
                                foreach($this->atedata['HCHANGE'] as $item) { ?>
                            <tr style="<?php if($color%2 == 0) echo('background-color:#f5f5f5;'); else echo('background-color:#fff;'); ?>" class="user_td">               
                                <td style="width:200px;"><?php echo($item['KOD_ATE']); ?></td>
                                <td style="width:200px;"><?php echo ($item['REDATE'])? date("d.m.Y", strtotime($item['REDATE'])) : $item['REDATE']; ?></td>
                                <td style="width:200px;"><?php echo($item['CHANGES']); ?></td>
                                <td style="width:100px; font-size:10px;">
                                    <input type="button" value="Редактировать" onclick="ajaxateedithchangeate(<?php echo($item['ID'].', '.$this->atedata['KOD_ATE']); ?>)"/>                   
                                </td>
                                <td style="width:100px; font-size:10px;">
                                    <input type="button" value="Удалить" onclick="ajaxatelisthchangeate('del',<?php echo($item['ID'].',' .$item['KOD_ATE']); ?>)"/>                   
                                </td>
                            </tr>
                            <?php $color++; } ?>
                            <tr>
                                <td colspan="5" style="height:1px; background-color:#2a4984;"></td>
                            </tr>            
                        </table>
                    <?php } ?>
                    <div style="margin-bottom:20px;">
                        <input style="float:right;" type="button" value="Добавить запись" onclick="ajaxateedithchangeate(0,<?php echo($this->atedata['KOD_ATE']); ?>)"/>
                    </div>
                </div>     

                <div style="height:20px; padding-top:20px;">
                 	<input style="float:left" type="button" onclick="document.location='/listate'" value="Назад"/>
                    <input style="float:right" type="submit" name="saveate" value="Сохранить запись" />
                    <?php if($this->id) { ?><input style="float:right" type="button" onclick="del()" name="delate" value="Удалить запись" /><?php } ?>              
                </div>
            </div>
        </form>
        <!--<?php echo("<pre>"); print_r($this->atedata); ?>-->
    </div> 
</div>