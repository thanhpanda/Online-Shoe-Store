<?php 
$DSCategory = GetCategory();
$DSCategory1 = GetCategory();
?>
<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue"><li class="active"><a href="index.php">Home</a></li>
					<?php 
					while($row = $DSCategory->fetch_array()){
						?>
							<li class="grid">
								<a href="index.php?pages=products&id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a>
							</li>
						<?php
					}
					?>
					<li class="grid"><a href="#">Brands</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<?php 
									while($row = $DSCategory1->fetch_array()){
										?>
											<ul>
												<li><a href="index.php?pages=products&id=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></li>
											</ul>
										<?php
									}
									?>	
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>