@extends('layouts.level-two-no-m-search-bar')

{{-- this is to include the mobile search bar
@section('header-m-search-bar')
	@include('includes.header-m-search-bar')
@overwrite
--}}

@section('content')
	<h1>Ubinion Terms of use</h1>
		<p>
			Updated <i>4 February 2015</i>
		</p>
		<ol class="text-justify">
			<li>
				<h3><strong>Using our Services</strong></h3>
				<p>
					Please read these Terms of Use (“Terms”) carefully. By accessing, services of Ubinion.  You agree to be bound by these Terms. These Terms affect your legal rights and obligations, so if you do not agree to these Terms, do not use the Services.
					Don’t misuse our Services. For example, don’t interfere with our Services or try to access them using a method other than the interface and the instructions that we provide. You may use our Services only as permitted by law, including applicable export and re-export control laws and regulations. We may suspend or stop providing our Services to you if you do not comply with our terms or policies or if we are investigating suspected misconduct. 
					Using our Services does not give you ownership of any intellectual property rights in our Services or the content you access. You may not use content from our Services unless you obtain permission from its owner or are otherwise permitted by law. These terms do not grant you the right to use any branding or logos used in our Services. Don’t remove, obscure, or alter any legal notices displayed in or along with our Services. 
					Our Services display some content that is not Ubinion’s. This content is the sole responsibility of the entity that makes it available. We may review content to determine whether it is illegal or violates our policies, and we may remove or refuse to display content that we reasonably believe violates our policies or the law. But that does not necessarily mean that we review content, so please don’t assume that we do. 
					In connection with your use of the Services, we may send you service announcements, administrative messages, and other information. You may opt out of some of those communications. 

				</p>
			</li>
			<li>
				<h3><strong>General Use</strong></h3>
				<p>
					You must be at least <strong>17</strong> to use our Services. Our Services are not designed for children under <strong>13</strong>. If we discover that a child under 13 has provided us with personal information, we will delete such information from our systems.
					Contact Us
				</p>
			</li>
			<li>
				<h3><strong>Privacy</strong></h3>
				<p>
					In <a href="{{ URL::route('privacy-page')}}">Ubinion Privacy</a>, we explain how we treat your personal data and protect your privacy when you use our Services. By using our Services, you agree that Ubinion can use such data in accordance with our privacy policies.
					<a href="url" class="about" data-toggle="modal" data-target="#ContactModal">Contact Us</a>
				</p>
			</li>
			<li>
				<h3><strong>Post content</strong></h3>
				<p>
					You agree that you are solely responsible for your User Content and any claims arising therefrom, and that Ubinion is not responsible or liable for any User Content or claims arising therefrom. While we are not obligated to do so, we reserve the right, and have absolute discretion, to review, screen, and delete User Content at any time and for any reason. 
				</p>
			</li>
			<li>
				<h3><strong>Prohibited Activities</strong></h3>
				<p>
					<ul>
						<li>Defame, abuse, harass, stalk, threaten, or otherwise violate the legal rights (such as rights of privacy and publicity) of others.</li>
						<li>Use racially or ethnically offensive language.</li>
						<li>Discuss or incite illegal activity.</li>
						<li>Compromise the security of the Services</li>
						<li>Send any unsolicited or unauthorized advertising, spam, solicitations, or promotional materials; </li>
						<li>Use the Services for any illegal or unauthorized purpose or engage in, encourage, or promote any activity that violates these Terms</li>
						<li>Use any robot, spider, crawler, scraper, or other automated means or interface not provided by us to access the Services or to extract data.</li>
						<li>Use or attempt to use another user’s account without authorization; </li>
						<li>Alter the opinions or comments posted by others on the Services.</li>
						<li>Post anything contrary to our public image, goodwill or reputation.</li>
					</ul>	
				</p>
			</li>
			<li>
				<h3><strong>Modifying and Terminating our Services</strong></h3>
				<p>
					We are constantly changing and improving our Services. We may add or remove functionalities or features, and we may suspend or stop a Service altogether. 
					You can stop using our Services at any time, although we’ll be sorry to see you go. Ubinion may also stop providing Services to you, or add or create new limits to our Services at any time. 
					We believe that you own your data and preserving your access to such data is important. If we discontinue a Service, where reasonably possible, we will give you reasonable advance notice and a chance to get information out of that Service. 

				</p>
			</li>																			
		</ol>	
@stop