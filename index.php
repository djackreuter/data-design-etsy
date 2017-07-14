<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Data Design | Etsy</title>
	</head>
	<body>
		<h1>Data Design Etsy</h1>
		<h2>Persona</h2>
		<img src="images/beth.jpg" alt="picture of persona"/>
		<p><strong>Name:</strong> Beth Macbeth</p>
		<p><strong>Age:</strong> 31</p>
		<p><strong>Profession:</strong> Beth is a stay at home mom with a 2 year old daughter and a newborn son. She is
			a long time user of Etsy and really enjoys the crafts and trinkets that other people have made. Beth has
			dabbled in making her own crafts before and is getting ready to put 3 of them up for sale for the first
			time. While she is very familiar with the purchasing process on Etsy, she has never sold anything on the
			site before, so it will be a new experience for her. Based on her familiarity with purchasing, she
			is confident about her ability to post her items and does not anticipate any problems.</p>
		<p><strong>Technology:</strong> Beth is devoted to Apple and has the latest iPhone 7, iPad Pro, a Macbook Air,
			and a 21.5" iMac. She is comfortable using them, but does not know the entire scope of what they can do.</p>
		<p><strong>Attitudes &amp; Behaviors:</strong> Beth is very busy during the day taking care of her two kids. She
			often gets up early in the morning before her kids in order to have some quiet time to herself and drink
			coffee. This is when she will browse Etsy the most. Throughout the rest of the day, she will browse Etsy
			off and on while her kids are napping or otherwise entertained. However her browsing sessions are
			often limited to 5 - 10 minutes. At night after her kids go to bed is when Beth will spend an hour working
			on her crafts as a way to relax before going to bed.</p>
		<p><strong>Frustrations &amp; Needs:</strong> Beth is pretty familiar with the motions she goes through regularly
			on all of her devices, as well and the purchasing process on Etsy. However she sometimes requires assistance
			if she is performing a new task on her iPhone or computer. Beth will attempt to figure it out on her own for
			about 3 to 5 minutes before getting frustrated and quiting, only to ask her friend or husband about it later
			on if she remembers. Beth wants to be able to post her crafts for sale as easily as she makes purchases.
			She will be doing this in the morning and will have limited time before her children get up and she has to
			start her day.</p>
		<p><strong>Goals:</strong> Beth wants to sell her crafts that she makes on Etsy and wants other people to enjoy
			them just as much as she enjoys her purchases from others. Beth is sensitive to everything going smoothly
			for posting her items, especially sense this is her first time. She knows that she doesn't have a lot of
			time to do this and will not have the time or patience for unexpected problems.</p>
		<p><strong>Use Case:</strong> Beth is up early as usual on a Tuesday morning with her coffee in hand and all
			set to post her items. She has her Macbook open to Etsy and is all logged in and ready to go. She
			even took pictures of her items the night before and has them in a folder on her desktop ready to be
			uploaded to her posts. She knows she has about 45 min before her kids usually wake up and she wants to hurry
			and get it done.</p>
		<p><strong>Interaction Flow:</strong> On Etsy homepage, user clicks on &quot;Sell on Etsy&quot;. The browser
			then goes to a new page with a button in the center that says &quot;Open your Etsy shop&quot;. Below that on
			the page are highlights of selling on Etsy, such as low fees, powerful tools, and support and education,
			which all have a &quot;learn more&quot; button on the bottom to read about each one.</p>
		<p>After the user clicks on &quot;Open your Etsy shop&quot; the browser has a pop up on the same screen that
			asks the user to either create an account or log in.</p>
		<p>After the user logs in, the first page shows &quot;Shop Preferences&quot; where the user selects the shop's
			language, country, and currency. Below that is a question &quot;which of these best describes you?&quot;
			with radio buttons that list:</p>
		<ul>
			<li>Selling is my full-time job</li>
			<li>I sell part-time but hope to sell full-time</li>
			<li>I sell part-time and that's how I like it</li>
			<li>Other</li>
		</ul>
		<p>After the user makes their selections they are brought to the next section which is &quot;name your
			shop&quot;. The user enters their desired shop name and is able to instantly check its availability. The
			user then clicks on &quot;Save & Continue&quot; and they are brought to the next section to stock their
			shop</p>
		<p>The &quot;Stock your shop&quot; section has panels with a plus sign on the first one indicating to click on
			it to add items. There is a message at the top of the page that suggests adding 10 or more items to start in
			order to increase chances of being discovered.</p>
		<p>Once the plus sign is clicked, a new page loads that says &quot;add a new listing&quot;. There are 4
			sections to the page &quot;photos, listing details, inventory and pricing, and shipping&quot;. Each section is
			accessed by scrolling down on the page, and they all have instructions on filling out each section. Each
			section has a variety of drop downs to select from for what is applicable to their items. Depending on what
			the user selects, additional drop downs may populate. The user is unable to move forward until all the
			required fields are filled out. Once the user is finished, they click &quot;Save & Continue&quot; to move
			on.</p>
		<p>The user is then brought back to the &quot;Stock your Shop&quot; section where they can repeat the process
			they just completed for additional items. The item(s) they listed already are shown as a thumbnail on the
			panel. Once the user has completed this process for all the items they are selling, they click on &quot;Save
			and Continue&quot;</p>
		<p>The user is then brought to a section &quot;How you'll get paid&quot; where they are presented with a drop
			down menu to select the country that their bank is located. Once the user makes their selection, additional
			information fields populate on the screen asking:</p>
		<dl>
			<dt>Where should we deposit your funds?</dt>
			<dd>- Asks for bank account information such as bank name, name on account, account number, and BSB code</dd>
			<dt>Tell us a little about yourself</dt>
			<dd>- Country of residence, first name, last name, date of birth, and home address</dd>
		</dl>
		<p>The last section the user is brought to after clicking on &quot;Save and Continue&quot; is &quot;Set up
			Billing&quot;</p>
		<p>After these steps have been completed, the item(s) will be successfully posted for sale.</p>
		<p><strong>Conceptual Model</strong></p>
		<p>Profile (1-to-1)</p> <!-- one user can have one profile/account -->
		<ul>
			<li>profileId(primary key)</li>
			<li>profileEmail</li>
			<li>profilePass</li>
			<li>profileContact</li>
		</ul>
		<p>Item (1-to-n)</p> <!-- one profile can have many items for sale -->
		<ul>
			<li>itemId(primary key)</li>
			<li>itemProfileId(foreign key)</li>
			<li>itemInfo</li>
		</ul>
		<p>Favorites(m-to-n)</p> <!-- many profiles can favorite many items -->
		<ul>
			<li>favUserId(foreign key)</li>
			<li>favItemId(foreign key)</li>
		</ul>
	</body>
</html>