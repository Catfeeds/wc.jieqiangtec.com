@echo off

rem -----------------------------------------------------------
rem  LAJP-Java Socket Service �����ű� 
rem		
rem 		(2009-10 http://code.google.com/p/lajp/)
rem  
rem -----------------------------------------------------------

rem java��������Ҫ��jar�ļ���classpath·������ҵ����򡢵�����jar�ļ�log4j��
set classpath=lajp-10.05.jar;test_service

rem �Զ�������ͷ�����LAJP��������ʱ���Զ����ز�ִ��
rem set AUTORUN_CLASS=com.foo.AutoRunClass
rem set AUTORUN_METHOD=AutoRunMethod

rem �ַ�������  GBK | UTF-8
rem set CHARSET=UTF-8

rem LAJP��������ָ��
java -classpath .;lajp-socket_9.10.jar;%classpath% lajpsocket.PhpJava
