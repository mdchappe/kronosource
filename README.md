kronosource
===========
<h3>! {LESS} IS REQUIRED, DO NOT UPDATE .css FILES !</h3>
<hr>
<h2>Steps to configure for local development:</h2>
<ul>
<li>pull to get latest <code>kronosource_local_db.zip</code></li>
<li>download <a target="_blank" href="http://www.mamp.info/en/index.html">MAMP</a></li>
<li>Go to <a target="_blank" href="http://localhost/MAMP/">http://localhost/MAMP/</a></li>
<li>Click on myPHPAdmin at the top</li>
<li>create a database named <code>db491689781</code></li>
<li>click on the newly created db in the left-nav</li>
<li>click on the import tab</li>
<li>import the <code>db491689781.sql</code> file in <code>kronosource_local_db.zip</code></li>
<li>cd to <code>your-local-repository/application/config</code></li>
<li>run: <code>git update-index --assume-unchanged config.php</code></li>
<li>run: <code>git update-index --assume-unchanged database.php</code></li>
<li>open config.php and change <code>line 17</code> to <code>$config['base_url']	= 'http://localhost:8888/';</code></li>
<li>open database.php and change <code>line 51</code> - <code>line 54</code> to<br>
"<br><code>
$db['kronosource']['hostname'] = 'localhost:8889';<br>
$db['kronosource']['username'] = 'root';<br>
$db['kronosource']['password'] = 'root';<br>
$db['kronosource']['database'] = 'db491689781';</code><br>
"
</li>
<li>copy the <code>config.php</code> and <code>database.php</code> into your local <code>/application/config</code> directory</li>
<li>configure MAMP accordingly</li>
</ul>
