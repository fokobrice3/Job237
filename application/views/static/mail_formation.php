<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Portfolio - Responsive Email Template</title>
		<style type="text/css">
			/* ----- Custom Font Import ----- */
			@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&subset=latin,latin-ext);

			/* ----- Text Styles ----- */
			table{
				font-family: 'Lato', Arial, sans-serif;
				-webkit-font-smoothing: antialiased;
				-moz-font-smoothing: antialiased;
				font-smoothing: antialiased;
			}
			table tr td{
				font-size:24px; text-decoration: none; color: #000000;line-height:1.5em;
				
			}
			@media only screen and (max-width: 700px){
				/* ----- Base styles ----- */
				.full-width-container{
					padding: 0 !important;
				}

				.container{
					width: 100% !important;
				}

				/* ----- Header ----- */
				.header td{
					padding: 30px 15px 30px 15px !important;
				}

				/* ----- Projects list ----- */
				.projects-list{
					display: block !important;
				}

				.projects-list tr{
					display: block !important;
				}

				.projects-list td{
					display: block !important;
				}

				.projects-list tbody{
					display: block !important;
				}

				.projects-list img{
					margin: 0 auto 25px auto;
				}

				/* ----- Half block ----- */
				.half-block{
					display: block !important;
				}

				.half-block tr{
					display: block !important;
				}

				.half-block td{
					display: block !important;
				}

				.half-block__image{
					width: 100% !important;
					background-size: cover;
				}

				.half-block__content{
					width: 100% !important;
					box-sizing: border-box;
					padding: 25px 15px 25px 15px !important;
				}

				/* ----- Hero subheader ----- */
				.hero-subheader__title{
					padding: 80px 15px 15px 15px !important;
					font-size: 35px !important;
				}

				.hero-subheader__content{
					padding: 0 15px 90px 15px !important;
				}

				/* ----- Title block ----- */
				.title-block{
					padding: 0 15px 0 15px;
				}

				/* ----- Paragraph block ----- */
				.paragraph-block__content{
					padding: 25px 15px 18px 15px !important;
				}

				/* ----- Info bullets ----- */
				.info-bullets{
					display: block !important;
				}

				.info-bullets tr{
					display: block !important;
				}

				.info-bullets td{
					display: block !important;
				}

				.info-bullets tbody{
					display: block;
				}

				.info-bullets__icon{
					text-align: center;
					padding: 0 0 15px 0 !important;
				}

				.info-bullets__content{
					text-align: center;
				}

				.info-bullets__block{
					padding: 25px !important;
				}

				/* ----- CTA block ----- */
				.cta-block__title{
					padding: 35px 15px 0 15px !important;
				}

				.cta-block__content{
					padding: 20px 15px 27px 15px !important;
				}

				.cta-block__button{
					padding: 0 15px 0 15px !important;
				}
			}
		</style>

		<!--[if gte mso 9]><xml>
			<o:OfficeDocumentSettings>
				<o:AllowPNG/>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml><![endif]-->
	</head>

	<body style="padding: 0; margin: 0;" bgcolor="#eeeeee">
		<!-- / Full width container -->
		<table class="full-width-container" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#eeeeee" style="width: 100%; height: 100%; padding: 30px 0 30px 0;">
			<tr>
				<td align="center" valign="top">
					<!-- / 800px container -->
					<table class="container" border="0" cellpadding="0" cellspacing="0" width="800" bgcolor="#ffffff" style="width: 800px;">
						<tr>
							<td align="center" valign="top">
								<!-- / Header -->
								<table class="container header" border="0" cellpadding="0" cellspacing="0" width="700" style="width: 700px;">
									<tr>
										<td style="padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;" align="left">
											<a href="http://rexcocam-france.fr" style="font-size: 30px; text-decoration: none; color: #000000;">
												<img style="width:80px;" src="<?php echo img_url('logo.png'); ?>"> 
										</td>
										<td style="padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;" align="left">
											<a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">
												<span style="float:right;margin-right:50px;margin-top:10px;">MAIL REXCOCAM-FRANCE.FR</span><br></a>
										</td>
									</tr>
								</table>
								
								<!-- / infos -->
								<table class="container header" border="0" cellpadding="0" cellspacing="0" width="720" style="width: 720px;">
									<tr>				
										<td style="width:30%;padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;" align="left">
											<a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">
												<img style="border: 1px solid #999;
															border-radius:2px;
															padding: 15px;
															vertical-align: middle;
															-moz-box-sizing: border-box;
															box-sizing: border-box;
															width:200px !important;
															display: block;
															max-width: 100%;
															height: auto;" src="<?php echo img_url('av11.png'); ?>"></a>
										</td> 
										<td style="padding: 0px 0 30px 20px; border-bottom: solid 1px #eeeeee;" align="left">
											<p style="font-family:helvetica;font-size:24px;font-style:italic;margin:15px 0;"><?php echo $civilite ?> &nbsp;<?php echo $prenom ?> &nbsp;<strong><?php echo $nom ?></strong></p>
											<table width="380" style="width:400px;border:1px solid silver;text-align:right;" border="1" cellpadding="2" cellspacing="0">												
												<tr><td style="font-size:17px;padding:5px;">ACTIVITE </td>
													<td style="font-size:17px;padding:5px;"><em><?php echo $activite ?></em></td></tr>
												<tr><td style="font-size:17px;padding:5px;">FONCTION </td>
													<td style="font-size:17px;padding:5px;"><em><?php echo $fonction ?></em></td></tr>
												<tr><td style="font-size:17px;padding:5px;">EFFECTIF SALARIE </td>
													<td style="font-size:17px;padding:5px;"><em><?php echo $effSalarie ?></em></td></tr>
												<tr><td style="font-size:17px;padding:5px;">TELEPHONE  </td>
													<td style="font-size:17px;padding:5px;"><em><?php echo $tel ?><em></td></tr> 
											</table>									
										</td>
									</tr>
								</table>

								<!-- / Message -->
								<table class="container hero-subheader" border="0" cellpadding="0" cellspacing="0" width="720" style="width: 720px;">
									<tr>
										<td class="hero-subheader__title" style="font-size: 43px; font-weight: bold; padding: 20px 0 15px 0;" align="left">MESSAGE</td>
									</tr>

									<tr>
										<td class="hero-subheader__content" style="font-size: 18px; line-height: 27px; color: #969696; padding: 0 60px 50px 0;" align="left"><?php echo $comment ?></td>
									</tr>
								</table>
								
								<!-- / Footer -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-top: 1px solid #eeeeee; width: 620px;">
												<tr>
													<td style="text-align: center; padding: 50px 0 10px 0;">
														<a href="http://rexcocam-france.fr" style="font-size: 28px; text-decoration: none; color: #d5d5d5;">MESSAGERIE REXCOCAM-FRANCE</a>
													</td>
												</tr>

												<tr>
													<td align="middle">
														<table width="60" height="2" border="0" cellpadding="0" cellspacing="0" style="width: 60px; height: 2px;">
															<tr>
																<td align="middle" width="60" height="2"><img style="width: 80px;" src="<?php echo img_url('logo.png'); ?>"></td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td style="color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;">Copyright &copy; 2018 <a href="http://rexcocam-france.fr" target="_blank" style="text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;">NewBase Tech</a>. <br />TOus les droits reservés</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Footer -->
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>