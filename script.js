function chk(x,y)
{
	a=document.getElementsByTagName("input");
	if(a[x].value=='garima@gmail.com' && a[y].value=='abc123' && y==1)
		location.href='admin_section.html';
	else if(a[x].value.length!=0 && a[y].value.length!=0 && y==3)
		location.href='librarian_section.html';
	else
		alert("Please fill the details correctly");
}
function chk1()
{
	a=document.getElementsByTagName("input");
	var flag=0;
	for(i=0;i<a.length;i++)
	{
		if(a[i].value.length!=0)
			flag++;
	}
	if(flag!=a.length)
		alert("Please fill the missing field");
	else
	{
		alert("Added Successfully");
		location.reload();
	}
}
function chk2()
{
	a=document.getElementsByTagName("input");
	var flag=0;
	for(i=0;i<a.length;i++)
	{
		if(a[i].value.length!=0)
			flag++;
	}
	if(flag!=a.length)
		alert("Please fill the missing field");
	else
		location.reload();
}