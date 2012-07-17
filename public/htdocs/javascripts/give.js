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
				