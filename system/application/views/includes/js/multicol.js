<SCRIPT language="javascript">
		function addRow1(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "checkbox";
			cell1.appendChild(element1);



			var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
			element2.type = "text";
			cell2.appendChild(element2);
			
			var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
			element3.type = "text";
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "text";
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(4);
			var element5 = document.createElement("input");
			element5.type = "text";
			cell5.appendChild(element5);
			
			var cell6 = row.insertCell(5);
			var element6 = document.createElement("input");
			element6.type = "text";
			cell6.appendChild(element6);
			
			var cell7 = row.insertCell(6);
			var element7 = document.createElement("input");
			element7.type = "text";
			cell7.appendChild(element7);
			
		
		}

		function deleteRow1(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					table.deleteRow(i);
					rowCount--;
					i--;
				}

			}
			}catch(e) {
				alert(e);
			}
		}

	</SCRIPT>