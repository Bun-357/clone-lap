<?php
/*
Model Lap0
���ҧ�� ��� ��ɯ� ������⪵�
���ҧ����� 29/4/2557



function ������
openfile :: �֧�����Ũҡ������˹�����
browseOpenFile :: �֧��������� ��ä�˹�Ҩҡ˹�� V


*/
class Lap0 extends CI_Model//r
{
	function __construct()//r
	{
		parent::__construct();//r
	}
	/*function openfile()//�֧�����Ũҡ������˹�����//d
	{//d
		$data['test'] = fopen("Lab0-testcase.php","r");//d
		return $data;//d
	}//d*/
	function browseOpenFile($fileName)//�֧��������� ��ä�˹�Ҩҡ˹�� //a
	{//a
		$data = file($fileName);//a
		return $data;//a
	}//a
}


?>