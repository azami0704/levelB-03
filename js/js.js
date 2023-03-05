// JavaScript Document
function lof(x)
{
	location.href=x
}

function re(){
	location.reload();
}

function del(table,id){
	$.post("./api/del.php",{table,id})
	.done(res=>{
		re();
	})
}
function sh(table,id){
	$.post("./api/sh.php",{table,id})
	.done(res=>{
		re();
	})
}
function sw(table,now,target){
	$.post("./api/sw.php",{table,now,target})
	.done(res=>{
		re();
	})
}