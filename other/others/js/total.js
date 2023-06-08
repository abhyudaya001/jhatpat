function add()
		{
			var qty1 = document.getElementById('qty1').value;
			var qty2 = document.getElementById('qty2').value;
			var qty3 = document.getElementById('qty3').value;
			var qty4 = document.getElementById('qty4').value;
			var qty5 = document.getElementById('qty5').value;
			var qty6 = document.getElementById('qty6').value;
			var qty7 = document.getElementById('qty7').value;
			var qty8 = document.getElementById('qty8').value;
			var qty9 = document.getElementById('qty9').value;

			var q1 = qty1*1;
			var q2 = qty2*2;
			var q3 = qty3*3;
			var q4 = qty4*4;
			var q5 = qty5*5;
			var q6 = qty6*6;
			var q7 = qty7*7;
			var q8 = qty8*8;
			var q9 = qty9*9;

			var sum = +q1 + +q2 + +q3 + +q4 + +q5 + +q6 + +q7 + +q8 + +q9;
			document.getElementById('total').innerHTML =sum;
		}