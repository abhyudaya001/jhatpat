function chk()
		{
			var qty1=document.getElementById("qty1");
			var qty2=document.getElementById("qty2");
			var qty3=document.getElementById("qty3");
			var qty4=document.getElementById("qty4");
			var qty5=document.getElementById("qty5");
			var qty6=document.getElementById("qty6");
			var qty7=document.getElementById("qty7");
			var qty8=document.getElementById("qty8");
			var qty9=document.getElementById("qty9");
			if((qty1.value=='' && qty2.value=='' && qty3.value=='' && qty4.value=='' &&qty5.value=='' && qty6.value==''	 && qty7.value=='' && qty8.value=='' &&qty9.value=='')||(qty1.value=='0' && qty2.value=='0' && qty3.	value=='0' && qty4.value=='0' && qty5.value=='0' && qty6.value=='0' && qty7.value=='0' && qty8.value=='	0' && qty9.value=='0' ))
			{
				alert("Please select atleast 1 item");
				return false;
			}
				return true;	
		}
