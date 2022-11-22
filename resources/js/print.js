function printlayer(layer){
	var generator = window.open("");
	var divToPrint = document.getElementById(layer);
	var htmlToPrint = ''+'<style type="text/css">'+
					  '@media print{'+'a[href]:after{content: none !important;}'+'}'+
					  '@page{'+'size:auto; margin:15mm;'+'}'+
					  'body{'+'margin:0; font-family: sans-serif, Helvetica;color:#000;'+'}'+
					  'table{'+'width:90%; page-break-inside: auto;'+'}'+
					  'thead{'+'display: table-row-group;'+'}'+
					  'tr{'+'page-break-inside: avoid;'+'}'+
					  'table, th, td{'+'border:1px solid #080809 !important; border-collapse:collapse; margin:0 auto;'+'}'+
					  'a{'+'text-decoration: none;color:#000;'+'}'+
					  'th, td{'+'padding:5px 5px; text-align:center'+'}'+
					  'tr:nth-child(even){'+'background:#E2E5E7;'+'}'+
					  'th{'+'padding-top:10px; border-right:1px solid #e0e0e0; margin:0 auto;'+'}'+
					  'td{'+'border-top:1px solid #e0e0e0; border-right:1px solid #e0e0e0'+'}'+
					  'td.first, th.first{'+'text-align:center;'+'}'+
					  'td.last, th.last{'+'border-right:none!important;'+'}'+
					  '</style>';
	htmlToPrint += divToPrint.outerHTML;
	generator.document.write(htmlToPrint);
	generator.print();
	generator.close();
}

function printlayer2(layer){
	var generator = window.open("");
	var divToPrint = document.getElementById(layer);
	var htmlToPrint = ''+'<style type="text/css">'+
					  '@media print{'+'a[href]:after{content: none !important;}'+'}'+
					  '@page{'+'size:auto; margin:15mm;'+'}'+
					  'body{'+'margin:0; font-family: sans-serif, Helvetica;color:#000; font-size:.9em;'+'}'+
					  'table{'+'width:90%; page-break-inside: auto;'+'}'+
					  'thead{'+'display: table-row-group;'+'}'+
					  'tr{'+'page-break-inside: avoid;'+'}'+
					  'tr#trHead{'+'height: 240px !important;'+'}'+
					  'table, th, td{'+'border:1px solid #080809 !important; border-collapse:collapse; margin:0 auto;'+'}'+
					  'th#vHeader{'+' transform: rotate(-90deg) !important;-webkit-transform: rotate(-90deg) !important;-moz-transform: rotate(-90deg) !important;-o-transform: rotate(-90deg) !important;  max-width: 20px !important; padding-right: 50px !important;'+'}'+
					  'th, td{'+'padding:5px 5px; text-align:center'+'}'+
					  'tr:nth-child(even){'+'background:#E2E5E7;'+'}'+
					  'th{'+'padding-top:10px; border-right:1px solid #e0e0e0; margin:0 auto;'+'}'+
					  'td{'+'border-top:1px solid #e0e0e0; border-right:1px solid #e0e0e0'+'}'+
					  'td.first, th.first{'+'text-align:center;'+'}'+
					  'td.last, th.last{'+'border-right:none!important;'+'}'+
					  '</style>';
	htmlToPrint += divToPrint.outerHTML;
	generator.document.write(htmlToPrint);
	generator.print();
	generator.close();
}

function printlayer3(layer){
	var generator = window.open("");
	var divToPrint = document.getElementById(layer);
	var htmlToPrint = ''+'<h3 style="text-align:center;">Login History</h3>'+
					  ''+'<style type="text/css">'+
					  '@media print{'+'a[href]:after{content: none !important;}'+'}'+
					  '@page{'+'size:auto; margin:15mm;'+'}'+
					  'body{'+'margin:0; font-family: sans-serif, Helvetica;color:#000;'+'}'+
					  'table{'+'width:90%; page-break-inside: auto;'+'}'+
					  'thead{'+'display: table-row-group;'+'}'+
					  'tr{'+'page-break-inside: avoid;'+'}'+
					  'table, th, td{'+'border:1px solid #080809 !important; border-collapse:collapse; margin:0 auto;'+'}'+
					  'a{'+'text-decoration: none;color:#000;'+'}'+
					  'th, td{'+'padding:5px 5px; text-align:center'+'}'+
					  'tr:nth-child(even){'+'background:#E2E5E7;'+'}'+
					  'th{'+'padding-top:10px; border-right:1px solid #e0e0e0; margin:0 auto;'+'}'+
					  'td{'+'border-top:1px solid #e0e0e0; border-right:1px solid #e0e0e0'+'}'+
					  'td.first, th.first{'+'text-align:center;'+'}'+
					  'td.name{'+'width:300px !important;text-align:left;'+'}'+
					  'td.last, th.last{'+'border-right:none!important;'+'}'+
					  '</style>';
	htmlToPrint += divToPrint.outerHTML;
	generator.document.write(htmlToPrint);
	generator.print();
	generator.close();
}