<script type="text/javascript">
function subm()
{
	$("#reports_form").submit();
}

$(document).ready(function(){ 
	change();
});

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
			change(); 
	    }  
	});
}
function change()
{
//	document.getElementById('obl').removeAttribute('disabled');
//	document.getElementById('ra').removeAttribute('disabled');
	document.getElementById('sovet').removeAttribute('disabled');
//	document.getElementById('existence').removeAttribute('disabled');
	var inputs = document.getElementsByName("report");
	var selectedValue = -1;
	var input_len = inputs.length;
	for (var i = 0; i < input_len; i++) {
	    if (inputs[i].checked)
	    {
	        selectedValue = inputs[i].value;
	        break;
	    }
	}
	
	switch (parseInt(selectedValue))
	{
	    case 1:
	        document.getElementById('sovet').setAttribute('disabled','disabled');
	        break;
			
		case 4:
	        document.getElementById('sovet').setAttribute('disabled','disabled');
	        break;
			
	    case 7:
		    document.getElementById('sovet').setAttribute('disabled','disabled');
	        break;
			
		default:
		    
	}
}
</script>
<div style="border:1px solid #C9C9C9; margin-bottom:20px;">
    <div id="top_news">
    	<div style="font-size:12px; color:#254074; text-align:center; padding-top:8px;">АТЕ и ТЕ: формирование отчета</div>
    </div>
    <form id="reports_form" style="padding:20px 20px 20px 20px;  background-color:#FFF;"method="post" action="/viewreportate" enctype="multipart/form-data" >
        <div style="padding:10px; background-color:#E7F9FB; height:60px;">
        
                <div style="padding:5px 0px 5px 0px; height:20px; float:left; width:450px;">Область:
                	<select style="width:305px; float:right;" name="obl" id="obl" onchange="ajaxselectraate();">
                		<option value=""></option>
                        <?php foreach($this->KN_obl as $item) { ?>
                			<option value="<?php echo($item['ID_OBL']); ?>" ><?php echo($item['OBL']); ?></option>
                		<?php } ?>
                	</select> 
                </div>
                <div id="div_sovet" style="padding:5px 0px 5px 0px; height:20px; float:right; width:450px;">Совет:
                	<select style="width:305px; float:right;" name="sovet" id="sovet">
                		<option value="">Выберите область и район</option>
 <!--                       <?php foreach($this->KN_sovet as $item) { ?>
                			<option value="<?php echo($item['SOATO']); ?>" ><?php echo($item['NAMERUS'].' '.$item['RATECUT']); ?></option>
                		<?php } ?>-->
                	</select> 
                </div>                
                <div id="div_ra" style="padding:5px 0px 5px 0px; height:20px; float:left; width:450px;">Район:
                	<select style="width:305px; float:right;" name="ra" id="ra"  onchange="ajaxselectsovet();">
                		<option value="">Выберите область</option>
                        <!--<?php foreach($this->KN_ra as $item) { ?>
                			<option value="<?php echo($item['ID_RA']); ?>" <?php echo ($this->atedata['ID_RA'] == $item['ID_RA'])? 'selected="selected"':'' ?>><?php echo($item['RA']); ?></option>
                		<?php } ?>-->                        
                	</select> 
                </div>
                
                <div style="padding:5px 0px 5px 0px; height:20px; float:right; width:450px;">Существование:
                    <select style="width:305px; float:right;" name="existence" id="existence">
                        <option value=""></option>
                        <option value="существует">существует</option>
                        <option value="не существует">не существует</option>                   
                    </select>
                </div>
        
        </div>
        
        <div style="margin:10px 0 0 10px;"><input type="radio" name="report" CHECKED value="1" onchange="change()"/>Сельсоветы и их центры (рус.яз)</div>
        <div style="margin:10px 0 0 10px;"><input type="radio" name="report" value="2" onchange="change()"/>Сельские населенные пункты по сельсоветам (рус. и бел. яз.,номенклатура, кол-во жителей)</div>
        <div style="margin:10px 0 0 10px;"><input type="radio" name="report" value="3" onchange="change()"/>Сельские населенные пункты по сельсоветам (рус. и бел. яз.) с источниками</div>
        <div style="margin:10px 0 0 10px;"><input type="radio" name="report" value="4" onchange="change()"/>Сельсоветы (рус. и бел. яз.) и их центры</div>
        <div style="margin:10px 0 0 10px;"><input type="radio" name="report" value="5" onchange="change()"/>Список расхождений в написании наименований</div>
        <div style="margin:10px 0 0 10px;"><input type="radio" name="report" value="6" onchange="change()"/>Сельские населенные пункты по сельсоветам (рус. и бел. яз.)</div>
        <div style="margin:10px 0 0 10px;"><input type="radio" name="report" value="7" onchange="change()"/>Алфавитный список населенных пунктов с номенклатурами</div>
        
        <div style="margin-top:10px; height:24px; padding:10px; background-color:#E7F9FB;">
            <input style="float:left" type="button" onclick="document.location='/listkn'" value="Назад"/>
            <input style="float:right" type="submit" name="zapros" value="Формировать отчет" />
        </div>
        
	</form>
</div>