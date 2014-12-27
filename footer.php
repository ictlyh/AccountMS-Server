<div class="footer">
	<?php if(!isset($username)){ ?>
	<!--	未登录时隐藏登录窗口和注册窗口，受激励时弹出	-->
		<div class="modal hide fade" id="login">
			<div class="modal-header">
				<!-- 关闭窗口图标	-->
				<button class="close" data-dismiss="modal">x</button>
				<h3>登录</h3>
			</div>
			<div class="modal-body"><br>
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
					<div class="control-group">
						<label class="control-label">用户名</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="user" placeholder="7~16位的字母，数字">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">密码</label>
						<div class="controls">
							<input type="password" class="input-xlarge" name="password" placeholder="请输入密码">
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<input name="action" value="login" type="hidden">
				<button class="btn btn-primary" type="submit">登录</button>
				<button class="btn" href="#login" data-toggle="modal">取消</button>
				</form>
			</div>
		</div>
		
		<div class="modal hide fade" id="register">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">x</a>
				<h3>注册</h3>
			</div>
			<div class="modal-body"><br>
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="control-group">
							<label class="control-label">用户名</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="user" placeholder="7~16位的字母，数字">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">密码</label>
							<div class="controls">
								<input type="password" class="input-xlarge" name="password" placeholder="请输入密码">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">再次输入密码</label>
							<div class="controls">
								<input type="password" class="input-xlarge" name="password-confirm" placeholder="确认密码">
							</div>
						</div>
			</div>
			<div class="modal-footer">
				<input name="action" type="hidden" value="register">
				<button type="submit" class="btn btn-primary">注册</button>
				<button class="btn" href="#register" data-toggle="modal">取消</button>
				</form>
			</div>
		</div>
	<?php } else { ?>
		<div class="modal hide fade" id="addinaccount">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">x</a>
				<h3>新增收入</h3>
			</div>
			<div class="modal-body"><br>
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="control-group">
							<label class="control-label">金额</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="money">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">时间</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="time">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">类型</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="type">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">付款人</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="handler">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">备注</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="mark">
							</div>
						</div>
			</div>
			<div class="modal-footer">
				<input name="action" type="hidden" value="addinaccount">
				<button type="submit" class="btn btn-primary">添加</button>
				<button class="btn" href="#addinaccount" data-toggle="modal">取消</button>
				</form>
			</div>
		</div>

		<div class="modal hide fade" id="addoutaccount">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">x</a>
				<h3>新增支出</h3>
			</div>
			<div class="modal-body"><br>
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="control-group">
							<label class="control-label">金额</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="money">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">时间</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="time">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">类型</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="type">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">地点</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="address">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">备注</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="mark">
							</div>
						</div>
			</div>
			<div class="modal-footer">
				<input name="action" type="hidden" value="addoutaccount">
				<button type="submit" class="btn btn-primary">添加</button>
				<button class="btn" href="#addoutaccount" data-toggle="modal">取消</button>
				</form>
			</div>
		</div>

		<div class="modal hide fade" id="addflag">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">x</a>
				<h3>新增便签</h3>
			</div>
			<div class="modal-body"><br>
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="control-group">
							<label class="control-label">内容</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="flag">
							</div>
						</div>
			</div>
			<div class="modal-footer">
				<input name="action" type="hidden" value="addflag">
				<button type="submit" class="btn btn-primary">添加</button>
				<button class="btn" href="#addflag" data-toggle="modal">取消</button>
				</form>
			</div>
		</div>
	<?php } ?>
</div>
