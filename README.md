AccountMS-Server
================
APP
App支持离线使用，要求最低Android版本4.3.1
APP同步数据时只同步便签，收入支出信息，并不同步账户
每次登陆APP时，联网条件下会自动同步账户信息到服务器
只支持将账户从APP同步到服务器，不支持从服务器同步账户到APP，故最好在APP上注册
APP上更改密码后，下次登陆APP时同步账户到服务器后服务器密码才更新

Server
支持注册，登陆，增删收入支出和便签
暂不支持更改信息
所有资料在服务器上明文保存，包括账户和密码，以后可能加密保存
MySQL语句没有进行安全性检查，请不要特意进行SQL注入破坏

Online Demo:http://www.mutouxiaogui.cn/accountms/
