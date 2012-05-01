<div class="markdown"><h1>doc.php</h1>

<p>doc.php is a PHP application that mimics a file explorer. 
Using html5 to display audio and video and <a href="http://michelf.com/projects/php-markdown/">PHP markdown by Michel Fortin</a> to parse these files into a simple but interactive file browser.</p>

<p>doc.php was created by <a href="https://twitter.com/makepanic">@makepanic</a>.</p>

<h2>What does it do?</h2>

<ul>
<li>parse files the way you want</li>
<li>limits the access to a defined root folder</li>
<li>individual rules for extensions</li>
<li>displays <code>.info</code> files inside the filemanager</li>
</ul>

<h2>Installation</h2>

<ol>
<li>download <a href="https://github.com/makepanic/doc.php">doc.php</a> from github.</li>
<li>extract <code>index.php</code> , <code>config.php</code> and the <code>lib</code> folder on your php enabled server</li>
<li>create a subfolder for your filesystem, default:<code>docphp</code></li>
<li>copy all the files you want to use in doc.php into the created folder</li>
</ol>

<h2>Default extensions</h2>

<ul>
<li>PDF - <code>pdf</code> Portable Document Format via embed object</li>
<li>Audio - <code>wav,mp3,ogg</code> Using html5 audio with a inline player that checks for compatibility</li>
<li>Code - <code>php,js,java,vb,cs,html,css</code> Display the code with pre and escape html chars</li>
<li>Image - <code>jpg,jpeg,gif,png,apng,bmp</code> Display images</li>
<li>Video - <code>mp4,wma,webm,ogv</code> Display a html5 video player</li>
</ul>

<h3>Additional Config</h3>

<p>open <code>config.php</code> and modify the define() commands if you want</p>

<pre><code>DOC_TITLE:          default: 'doc.php'
                    this string sets the title of the navigation bar
ROOT_DIR:           default: 'docs'
                    this string sets the root folder for your docphp presentation
MAX_NAV :           default: '4'
                    maximum number of breadcrumbs to dispay in the top navigation
SHORTEN_NAV:        default: '15'
                    maximum number of characters in the top navigation per folder
THEME:              default: 'light'
                    this string sets the title of the navigation bar
                    choose between 'dark' and 'light'
SHOW_EXTENSIONS:    default: 'false'
                    enable if you want to display file extensions
</code></pre>

<h3>License</h3>

<p><a href="http://sam.zoy.org/wtfpl/">WTFPL</a></p>

<h4>TODO</h4>

<ul>
<li>htaccess options for better links</li>
</ul>
</div>