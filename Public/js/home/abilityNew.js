// 纯JS省市区三级联动
// 2011-11-30 by http://www.cnblogs.com/zjfree

var provinceList = Array();

var ability_json;

function transform() {
	$.ajax({url: app_url + "/Custom/ability/genDB",
		async: false,
		type: "GET",
        dataType: 'JSON',
        success: function(result) {
        	ability_json = result;
        	var cnt1 = 0;
        	
        	for (o1 in ability_json) {
        		
        		var cityListArray = Array();
        		var cnt2 = 0;
        		
        		for (o2 in ability_json[o1]) {
        			
        			var areaListArray = Array();
        			var cnt3 = 0;
        			
        			for (o3 in ability_json[o1][o2]) {
        				areaListArray[cnt3] = ability_json[o1][o2][o3]['name'];
        				cnt3++;
        			}
        			cityListItem = new Object();
        			cityListItem.name = o2;
        			cityListItem.areaList = areaListArray;

        			cityListArray[cnt2] = cityListItem;
        			cnt2++;
        		}
        		
        		var provinceListItem = new Object();
        		provinceListItem.name = o1;
        		provinceListItem.cityList = cityListArray;
        		
        		provinceList[cnt1] = provinceListItem;
        		cnt1++;

        	}
        }
	});
}

var addressInit = function(_cmbProvince, _cmbCity, _cmbArea, defaultProvince, defaultCity, defaultArea)
{
	var cmbProvince = document.getElementById(_cmbProvince);
	var cmbCity = document.getElementById(_cmbCity);
	var cmbArea = document.getElementById(_cmbArea);
	
	function cmbSelect(cmb, str)
	{
		for(var i=0; i<cmb.options.length; i++)
		{
			if(cmb.options[i].value == str)
			{
				cmb.selectedIndex = i;
				return;
			}
		}
	}
	function cmbAddOption(cmb, str, obj)
	{
		var option = document.createElement("OPTION");
		cmb.options.add(option);
		option.innerHTML = str;
		option.value = str;
		option.obj = obj;
	}
	
	function changeCity()
	{
		cmbArea.options.length = 0;
		if(cmbCity.selectedIndex == -1)return;
		var item = cmbCity.options[cmbCity.selectedIndex].obj;
		for(var i=0; i<item.areaList.length; i++)
		{
			cmbAddOption(cmbArea, item.areaList[i], null);
		}
		cmbSelect(cmbArea, defaultArea);
	}
	function changeProvince()
	{
		cmbCity.options.length = 0;
		cmbCity.onchange = null;
		if(cmbProvince.selectedIndex == -1)return;
		var item = cmbProvince.options[cmbProvince.selectedIndex].obj;
		for(var i=0; i<item.cityList.length; i++)
		{
			cmbAddOption(cmbCity, item.cityList[i].name, item.cityList[i]);
		}
		cmbSelect(cmbCity, defaultCity);
		changeCity();
		cmbCity.onchange = changeCity;
	}
	
	transform();
	
	for(var i=0; i<provinceList.length; i++)
	{
		cmbAddOption(cmbProvince, provinceList[i].name, provinceList[i]);
	}
	cmbSelect(cmbProvince, defaultProvince);
	changeProvince();
	cmbProvince.onchange = changeProvince;
}
