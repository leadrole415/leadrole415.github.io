<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<div id="fh5co-logo">
								<a href="index.php">OSEE</a>
						</div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-1">
						<ul>
							<li class="has-dropdown">
								<a href="product.php">SHOP</a>
								<ul class="dropdown">
									<li>
										<a href="#">NEW ARRIVAL</a>
										<a href="#">OUTER</a>
										<a href="#">TOP</a>
										<a href="#">DRESS</a>
										<a href="#">BOTTOM</a>
										<a href="#">SALE</a>
									</li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="about.php">ABOUT</a>
							</li>
							<li class="has-dropdown">
								<a href="#">LOOKBOOK</a>
								<ul class="dropdown">
									<li>
										<a href="2018_fall.php">2018 FALL</a>
									</li>
									<li>
										<a href="2018_summer.php">2018 SUMMER</a>
									</li>
									<li>
										<a href="2018_spring.php">2018 SPRING</a>
									</li>
								</ul>
							</li>
							<!-- <li class="has-dropdown">
								<a href="#">SHOP</a>
								<ul class="dropdown">
									<li>
										<a href="#">OUTER</a>
									</li>
									<li>
										<a href="#">TOP</a>
									</li>
									<li>
										<a href="#">DRESS</a>
									</li>
									<li>
										<a href="#">SKIRT</a>
									</li>
									<li>
										<a href="#">PANTS</a>
									</li>
								</ul>
							</li> -->
							<li>
								<a href="contact.php">CONTACT</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							<li>

							<? if($memNm==""){
							?>
								<a href="login.php" style="color:rgb(73, 189, 190); font-weight:700">LOGIN</a>
							<? }else{
							?>
								<a href="logout.php" style="color:rgb(73, 189, 190); font-weight:700">LOGOUT</a>
							<?}?>
								<!-- <div class="input-group">
									<input type="text" placeholder="Search..">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button">
											<i class="icon-search"></i>
										</button>
									</span>
								</div> -->
							</li>
							<? if($memNm==""){
							?>
							<li>
								<a href="join.php">JOIN</a>
							</li>
							<?}?>
							<li>
								<a href="mypage.php"><img src="images/user.png" width="20px" alt=""></a>
							</li>
							<li>
								<a href="cart.php" class="cart">
									<span>
										<!-- <small id="sm"><?=$cartCount?></small> -->
										<img src="images/shopping-cart.png" width="20px" alt="">
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</nav>