<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="inputForm">
<table cellspacing="0" cellpadding="0" width="700" border="0">
  <tbody>
  <tr>
    <td  align="right">รหัสผ่าน :</td>
    <td><input id="pass" type="password" /></td>
</tr>
  <tr>
    <td align="right">ยืนยันรหัสผ่าน :</td>
    <td><input id="repass" type="password" /></td></tr>
</tbody></table>
  <input onclick="Check();" type="button" value="Submit" name="buttonSubmit" /> <input name="resetForm" type="reset" value="Clear Data" />
</form>
<script>
var pass=document.getElementByI("pass").value;
var repass=document.getElementByI("repass").value;
function Check()
{
   if(pass==repass)
    {
         //สิ่งที่กระทำเมื่อ pass ตรงกันเช่น alert("ผ่านแล้ว");
         alert('Bla bla.....');
    }else{
        alert('ควย.....');
    }
}
</script>
</body>
</html>