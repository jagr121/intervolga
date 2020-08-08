function data_output()
{
	//получение даннных
	$.ajax({
          url: 'ajax/output.php',
          dataType: "json",
        }).done(function(countryList)
								{
									var countryHTML = "";

									for(var i=0; i<countryList.length; i++){

									countryHTML += "<tr>" + "<th>" + countryList[i].id + "</th>";
									countryHTML += "<td>" + countryList[i].name + "</td>";
									countryHTML += "<td>" + countryList[i].fullname + "</td>";
									countryHTML += "<td>" + countryList[i].area + "</td>";
									countryHTML += "<td>" + countryList[i].population + "</td>" + "</tr>";
				        }

				        	$("#table_list").html(countryHTML);

				        }).fail(function(){ alert('Ошибка запроса к серверу!'); });
}

data_output();
