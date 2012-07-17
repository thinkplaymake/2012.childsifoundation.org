<!DOCTYPE html>
<html>
	
	<head>
		<title>Help abandoned children by donating to Child's i Foundation</title>
		<meta name="description" content="You can make a difference to abandoned children's lives by giving just £5 a month" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
		<style>
			
			#page { width: 960px; margin: 0 auto; }
			#jgsdi { border: 1px solid black; padding: 30px; font-size: 200%; }
			#jgsdi .footnote { font-size: 40%; }
			
			.col { display:inline-block; vertical-align:top; }
			#jgsdi input, #jgsdi select { font-size: 150%; }
			#jgsdi .amount input { width: 150px; }
			.cannotgive .col { width: 30%; margin-right: 15px; }
			.cannotgive p { height: 85px; }
			.donationvalue .col { width: 48%; margin-right: 15px; }
			.donationvalue h3 { font-size: 200%; }
			.donationvalue { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px #333 solid; }
			
		</style>
		
	</head>
	<body>
	
	
		<div id="page">
			<div class="header">
				<div class="logo col">
					<a href="/">CHILDSI</a>
				</div>
				<div class="col nav">
					<ul>
						<li class="col"><a href="http://www.childsifoundation.org/our-mission/">Learn more</a></li>
						<li class="col"><a href="http://www.childsifoundation.org/community">Get Involved</a></li>
						<li class="col"><a href="http://www.childsifoundation.org/blog">Updates</a></li>
						<li class="col"><a href="http://www.childsifoundation.org/give">Donate</a></li>
					</ul>
				</div>
			</div>
			
			<div class="headline">
				<h1>You can help abandoned children right now</h1>
			</div>
			
			<div class="widget desktop">
				<form id="jgsdi" action="http://www.justgiving.com/donation/direct/charity/185222">
					<input type="hidden" name="exitUrl" value="">
					
					<div class="i_wanna col">I want to give &pound;</div>
					<div class="amount col">
						<input type="number" name="amount" value="25" max="500"/>
					</div>
					<div class="frequency col">
						<select name="frequency">
							<option value="single">once</option>
							<option value="monthly">monthly</option>
						</select>
					</div>
					<div class="send col"><input type="submit" value="go" /></div>
					
					<div class="footnote">You'll be taken to JustGiving to make your donation, which is 100% safe, secure, and trusted by Child's i Foundation to handle your kind gift.</div>
				</form>
				
				<div class="donationvalue">
				
					<div class="is_worth col">
						<h3>Your £<span class="amount">5</span> <span class="frequency">donation</span> will pay for:</h3>
						<ul>
							<li><span class="nurse">6</span> hrs of a nursery nurse AND</li>
							<li><span class="electricity">16</span> hours of electricity AND</li>
							<li><span class="vaccs">10</span> vaccinations AND</li>
							<li><span class="tea">15</span> cups of tea</li>
						</ul>
					</div>
					
					<div class="couldbe_worth col">
						<div class="upgrade single">
							<h3>But by paying just £<span class="amount">5</span> a month, you can help our work to continue all year round</h3>
							<a href="#" class="button action">Give £<span class="amount">5</span> monthly</a>
						</div>
						<div class="upgrade monthly">
							<h3>With just an extra &pound;2 you can help keep the project running for another day</h3>
							<a href="#" class="button action">Increase your donation by &pound;2</a>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			<div class="cannotgive">
			
				<div class="time col">
					<h4>If you cannot give money..</h4>
					<p>Give time... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
					<p><a href="#" class="button">Something</a></p>
				</div>
				<div class="love col">
					<h4>If you cannot give time..</h4>
					<p>Give love... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
					<p><a href="#" class="button">Something</a></p>
				</div>
				<div class="wheremoneygoes col">
					<h4>See exactly where your money goes</h4>
					<p></p>
					<p><a href="#" class="button">Something</a></p>
				</div>
				
			</div>
			
			
			
			
		</div>
	
	
	
		<script>
		
			var donate_frequency = 'single';
			var donate_amount = 25;
			var recommend_amount = 4;
			var jgid = 185222;
			
			
			$(document).ready( function(){
				// init
				
				update_frequency();
				update_amount();
				
				$("#jgsdi select").change(function() { 
					donate_frequency = $(this).val();
					update_frequency();
				});
				
				$("#jgsdi input[name=amount]").change(function() { 
					donate_amount = $(this).val();
					update_amount();
				});
				
				$('.upgrade.monthly .button.action').click( function(e) {
					e.preventDefault();
					donate_amount += 2;
					update_amount();
					
					orig_text = $(this).text();
					setTimeout( "$('.upgrade.monthly .button.action').text( orig_text )", 3000 );
					$(this).text('Thank you!');
					
				} );
				
				$('.upgrade.single .button.action').click( function(e) {
					e.preventDefault();
					donate_amount = recommend_amount;
					donate_frequency = 'monthly';
					update_amount();
					update_frequency();
					
				} );
				
			} );
			
			function update_frequency(){
				$('.couldbe_worth .upgrade').hide();
				if (donate_frequency == 'monthly') $('.is_worth .frequency').text( 'a month' );
				if (donate_frequency == 'single') $('.is_worth .frequency').text( 'donation' );
				
				$("#jgsdi select[name=frequency]").val( donate_frequency );
				$('.couldbe_worth .' + donate_frequency).show();
			}
			
			function update_amount() {
				if (parseInt(donate_amount)!=donate_amount) {
					if (donate_frequency == 'monthly') donate_amount = 5;
					if (donate_frequency == 'single') donate_amount = 25;
				}
				if (donate_amount<1) {
					if (donate_frequency == 'monthly') donate_amount = 5;
					if (donate_frequency == 'single') donate_amount = 25;
				}
				$("#jgsdi input[name=amount]").val( donate_amount );
				$(".donationvalue .is_worth span.amount").text( donate_amount );
				
				
				if (donate_frequency == 'single') {
					recommend_amount = Math.ceil(donate_amount/10);
					if (recommend_amount<4) recommend_amount = 4;
					$('.couldbe_worth span.amount').text( recommend_amount );
				}
				
				// calculate spans
				$('.donationvalue .is_worth span.nurse').text( donate_amount * 0.5 );
				$('.donationvalue .is_worth span.electricity').text( donate_amount * 4 );
				$('.donationvalue .is_worth span.vaccs').text( donate_amount * 3 );
				$('.donationvalue .is_worth span.tea').text( donate_amount * 5 );
				
			}
						
			
		</script>
	
	</body>
	
</html>