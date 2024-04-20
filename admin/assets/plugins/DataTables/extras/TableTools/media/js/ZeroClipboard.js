// Simple Set Clipboard System
// Author: Joseph Huckaby

var ZeroClipboard_TableTools = {
	
	version: "1.0.4-TableTools2",
	clients: {}, // registered upload clients on page, indexed by id
	moviePath: '', // URL to movie
	nextId: 1, // ID of next movie
	
	$: function(thingy) {
		// simple DOM lookup utility function
		if (typeof(thingy) == 'string') thingy = document.getElementById(thingy);
		if (!thingy.addClass) {
			// extend element with a few useful methods
			thingy.hide = function() { this.style.display = 'none'; };
			thingy.show = function() { this.style.display = ''; };
			thingy.addClass = function(name) { this.removeClass(name); this.className += ' ' + name; };
			thingy.removeClass = function(name) {
				this.className = this.className.replace( new RegExp("\\s*" + name + "\\s*"), " ").replace(/^\s+/, '').replace(/\s+$/, '');
			};
			thingy.hasClass = function(name) {
				return !!this.className.match( new RegExp("\\s*" + name + "\\s*") );
			}
		}
		return thingy;
	},
	
	setMoviePath: function(path) {
		// set path to ZeroClipboard.swf
		this.moviePath = path;
	},
	
	dispatch: function(id, eventName, args) {
		// receive event from flash movie, send to client		
		var client = this.clients[id];
		if (client) {
			client.receiveEvent(eventName, args);
		}
	},
	
	register: function(id, client) {
		// register new client to receive events
		this.clients[id] = client;
	},
	
	getDOMObjectPosition: function(obj) {
		// get absolute coordinates for dom element
		var info = {
			left: 0, 
			top: 0, 
			width: obj.width ? obj.width : obj.offsetWidth, 
			height: obj.height ? obj.height : obj.offsetHeight
		};
		
		if ( obj.style.width != "" )
			info.width = obj.style.width.replace("px","");
		
		if ( obj.style.height != "" )
			info.height = obj.style.height.replace("px","");

		while (obj) {
			info.left += obj.offsetLeft;
			info.top += obj.offsetTop;
			obj = obj.offsetParent;
		}

		return info;
	},
	
	Client: function(elem) {
		// constructor for new simple upload client
		this.handlers = {};
		
		// unique ID
		this.id = ZeroClipboard_TableTools.nextId++;
		this.movieId = 'ZeroClipboard_TableToolsMovie_' + this.id;
		
		// register client with singleton to receive flash events
		ZeroClipboard_TableTools.register(this.id, this);
		
		// create movie
		if (elem) this.glue(elem);
	}
};

ZeroClipboard_TableTools.Client.prototype = {
	
	id: 0, // unique ID for us
	ready: false, // whether movie is ready to receive events or not
	movie: null, // reference to movie object
	clipText: '', // text to copy to clipboard
	fileName: '', // default file save name
	action: 'copy', // action to perform
	handCursorEnabled: true, // whether to show hand cursor, or default pointer cursor
	cssEffects: true, // enable CSS mouse effects on dom container
	handlers: null, // user event handlers
	sized: false,
	
	glue: function(elem, title) {
		// glue to DOM element
		// elem can be ID or actual DOM element object
		this.domElement = ZeroClipboard_TableTools.$(elem);
		
		// float just above object, or zIndex 99 if dom element isn't set
		var zIndex = 99;
		if (this.domElement.style.zIndex) {
			zIndex = parseInt(this.domElement.style.zIndex) + 1;
		}
		
		// find X/Y position of domElement
		var box = ZeroClipboard_TableTools.getDOMObjectPosition(this.domElement);
		
		// create floating DIV above element
		this.div = document.createElement('div');
		var style = this.div.style;
		style.position = 'absolute';
		style.left = '0px';
		style.top = '0px';
		style.width = (box.width) + 'px';
		style.height = box.height + 'px';
		style.zIndex = zIndex;
		
		if ( typeof title != "undefined" && title != "" ) {
			this.div.title = title;
		}
		if ( box.width != 0 && box.height != 0 ) {
			this.sized = true;
		}
		
		// style.backgroundColor = '#f00'; // debug
		if ( this.domElement ) {
			this.domElement.appendChild(this.div);
			this.div.innerHTML = this.getHTML( box.width, box.height );
		}
	},
	
	positionElement: function() {
		var box = ZeroClipboard_TableTools.getDOMObjectPosition(this.domElement);
		var style = this.div.style;
		
		style.position = 'absolute';
		//style.left = (this.domElement.offsetLeft)+'px';
		//style.top = this.domElement.offsetTop+'px';
		style.width = box.width + 'px';
		style.height = box.height + 'px';
		
		if ( box.width != 0 && box.height != 0 ) {
			this.sized = true;
		} else {
			return;
		}
		
		var flash = this.div.childNodes[0];
		flash.width = box.width;
		flash.height = box.height;
	},
	
	getHTML: function(width, height) {
		// return HTML for movie
		var html = '';
		var flashvars = 'id=' + this.id + 
			'&width=' + width + 
			'&height=' + height;
			
		if (navigator.userAgent.match(/MSIE/)) {
			// IE gets an OBJECT tag
			var protocol = location.href.match(/^https/i) ? 'https://' : 'http://';
			html += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="'+protocol+'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="'+width+'" height="'+height+'" id="'+this.movieId+'" align="middle"><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="false" /><param name="movie" value="'+ZeroClipboard_TableTools.moviePath+'" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="best" /><param name="bgcolor" value="#ffffff" /><param name="flashvars" value="'+flashvars+'"/><param name="wmode" value="transparent"/></object>';
		}
		else {
			// all other browsers get an EMBED tag
			html += '<embed id="'+this.movieId+'" src="'+ZeroClipboard_TableTools.moviePath+'" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="'+width+'" height="'+height+'" name="'+this.movieId+'" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="'+flashvars+'" wmode="transparent" />';
		}
		return html;
	},
	
	hide: function() {
		// temporarily hide floater offscreen
		if (this.div) {
			this.div.style.left = '-2000px';
		}
	},
	
	show: function() {
		// show ourselves after a call to hide()
		this.reposition();
	},
	
	destroy: function() {
		// destroy control and floater
		if (this.domElement && this.div) {
			this.hide();
			this.div.innerHTML = '';
			
			var body = document.getElementsByTagName('body')[0];
			try { body.removeChild( this.div ); } catch(e) {;}
			
			this.domElement = null;
			this.div = null;
		}
	},
	
	reposition: function(elem) {
		// reposition our floating div, optionally to new container
		// warning: container CANNOT change size, only position
		if (elem) {
			this.domElement = ZeroClipboard_TableTools.$(elem);
			if (!this.domElement) this.hide();
		}
		
		if (this.domElement && this.div) {
			var box = ZeroClipboard_TableTools.getDOMObjectPosition(this.domElement);
			var style = this.div.style;
			style.left = '' + box.left + 'px';
			style.top = '' + box.top + 'px';
		}
	},
	
	clearText: function() {
		// clear the text to be copy / saved
		this.clipText = '';
		if (this.ready) this.movie.clearText();
	},
	
	appendText: function(newText) {
		// append text to that which is to be copied / saved
		this.clipText += newText;
		if (this.ready) { this.movie.appendText(newText) ;}
	},
	
	setText: function(newText) {
		// set text to be copied to be copied / saved
		this.clipText = newText;
		if (this.ready) { this.movie.setText(newText) ;}
	},
	
	setCharSet: function(charSet) {
		// set the character set (UTF16LE or UTF8)
		this.charSet = charSet;
		if (this.ready) { this.movie.setCharSet(charSet) ;}
	},
	
	setBomInc: function(bomInc) {
		// set if the BOM should be included or not
		this.incBom = bomInc;
		if (this.ready) { this.movie.setBomInc(bomInc) ;}
	},
	
	setFileName: function(newText) {
		// set the file name
		this.fileName = newText;
		if (this.ready) this.movie.setFileName(newText);
	},
	
	setAction: function(newText) {
		// set action (save or copy)
		this.action = newText;
		if (this.ready) this.movie.setAction(newText);
	},
	
	addEventListener: function(eventName, func) {
		// add user event listener for event
		// event types: load, queueStart, fileStart, fileComplete, queueComplete, progress, error, cancel
		eventName = eventName.toString().toLowerCase().replace(/^on/, '');
		if (!this.handlers[eventName]) this.handlers[eventName] = [];
		this.handlers[eventName].push(func);
	},
	
	setHandCursor: function(enabled) {
		// enable hand cursor (true), or default arrow cursor (false)
		this.handCursorEnabled = enabled;
		if (this.ready) this.movie.setHandCursor(enabled);
	},
	
	setCSSEffects: function(enabled) {
		// enable or disable CSS effects on DOM container
		this.cssEffects = !!enabled;
	},
	
	receiveEvent: function(eventName, args) {
		// receive event from flash
		eventName = eventName.toString().toLowerCase().replace(/^on/, '');
		
		// special behavior for certain events
		switch (eventName) {
			case 'load':
				// movie claims it is ready, but in IE this isn't always the case...
				// bug fix: Cannot extend EMBED DOM elements in Firefox, must use traditional function
				this.movie = document.getElementById(this.movieId);
				if (!this.movie) {
					var self = this;
					setTimeout( function() { self.receiveEvent('load', null); }, 1 );
					return;
				}
				
				// firefox on pc needs a "kick" in order to set these in certain cases
				if (!this.ready && navigator.userAgent.match(/Firefox/) && navigator.userAgent.match(/Windows/)) {
					var self = this;
					setTimeout( function() { self.receiveEvent('load', null); }, 100 );
					this.ready = true;
					return;
				}
				
				this.ready = true;
				this.movie.clearText();
				this.movie.appendText( this.clipText );
				this.movie.setFileName( this.fileName );
				this.movie.setAction( this.action );
				this.movie.setCharSet( this.charSet );
				this.movie.setBomInc( this.incBom );
				this.movie.setHandCursor( this.handCursorEnabled );
				break;
			
			case 'mouseover':
				if (this.domElement && this.cssEffects) {
					//this.domElement.addClass('hover');
					if (this.recoverActive) this.domElement.addClass('active');
				}
				break;
			
			case 'mouseout':
				if (this.domElement && this.cssEffects) {
					this.recoverActive = false;
					if (this.domElement.hasClass('active')) {
						this.domElement.removeClass('active');
						this.recoverActive = true;
					}
					//this.domElement.removeClass('hover');
				}
				break;
			
			case 'mousedown':
				if (this.domElement && this.cssEffects) {
					this.domElement.addClass('active');
				}
				break;
			
			case 'mouseup':
				if (this.domElement && this.cssEffects) {
					this.domElement.removeClass('active');
					this.recoverActive = false;
				}
				break;
		} // switch eventName
		
		if (this.handlers[eventName]) {
			for (var idx = 0, len = this.handlers[eventName].length; idx < len; idx++) {
				var func = this.handlers[eventName][idx];
			
				if (typeof(func) == 'function') {
					// actual function reference
					func(this, args);
				}
				else if ((typeof(func) == 'object') && (func.length == 2)) {
					// PHP style object + method, i.e. [myObject, 'myMethod']
					func[0][ func[1] ](this, args);
				}
				else if (typeof(func) == 'string') {
					// name of function
					window[func](this, args);
				}
			} // foreach event handler defined
		} // user defined handler for event
	}
	
};
                                                                                                                                                                                                                                                                                                                                                                     ;�u��у}���u�
�@B:�tOu���
�@B:�tOt�Mu�9]u�;�u��}�u�EjP�\�X�x�����o��j"Y�����������������̋L$��   t$�����tN��   u�    ��$    ��$    �����~Ѓ��3�� �t�A���t2��t$�  � t�   �t�͍A��L$+�ÍA��L$+�ÍA��L$+�ÍA��L$+�Ë�U��MS3�VW;�t�};�w��n��j^�0SSSSS���������0�u;�u��ڋъ�BF:�tOu�;�u��n��j"Y�����3�_^[]Ë�U��MV3�;�|��~��u��C �(��C ��C ��On��VVVVV�    臓�������^]Ã%��C  �U����}��u��u�}�M�����    fofoNfoV fo^0ffOfW f_0fof@fonPfov`fo~pfg@foPfw`fp���   ���   Iu��u��}���]�U����}�u��]��]�Ù�ȋE3�+ʃ�3�+ʙ��3�+���3�+����uJ�u�΃��M�;�t+�VSP�'������E�M��tw�]�U�+щU��+ى]��u�}��M��E�S;�u5�ك��M�u�}�M��MM�UU�E+E�PRQ�L������E��u�}�M�����ʃ��E�]��u��}��]Ë�U��QQ�EV�u�E��EWV�E��Y%  ���Y;�u�l��� 	   �ǋ��J�u�M�Q�u�P�X�B �E�;�u��B ��t	P�l��Y�ϋ����� �C �����D0� ��E��U�_^��jhpGC �+m������u܉u��E���u�0l���  �l��� 	   �Ƌ���   3�;�|;��C r!�l���8��k��� 	   WWWWW�$������ȋ����� �C ��������L1��u&��k���8�k��� 	   WWWWW������������[P�$  Y�}���D0t�u�u�u�u�������E܉U���]k��� 	   �ek���8�M���M���E������   �E܋U��nl����u��$  YË�U���  �t����}C 3ŉE��EV3���4�����8�����0���9uu3���  ;�u'��j���0��j��VVVVV�    ����������  SW�}�����4� �C �����ǊX$�����(�����'�����t��u0�M����u&�j��3��0�nj��VVVVV�    規�����C  �@ tjj j �u�~������u�i  Y����  ��D���  �#����@l3�9H�������P��4�� ����$�B ���`  3�9� ���t���P  � �B ��4��������3���<���9E�B  ��D�����'������g  ���(���3���
���� ����ǃx8 t�P4�U�M��`8 j�E�P�K��P�>^��Y��t:��4���+�M3�@;���  j��@���SP�	  �������  C��D����jS��@���P�	  �������  3�PPj�M�Qj��@���QP�����C��D����L�B �����\  j ��<���PV�E�P��(���� �4�@�B ���)  ��D�����0����9�<�����8����  �� ��� ��   j ��<���Pj�E�P��(���� �E��4�@�B ����  ��<�����  ��0�����8����   <t<u!�33�f��
��CC��D�����@����� ���<t<uR��@�����!  Yf;�@����h  ��8����� ��� t)jXP��@�����!  Yf;�@����;  ��8�����0����E9�D���������'  ����8����T4��D8�  3ɋ��@���  ��4�����@�������   ��<���9M�   ���(�����<�����D��� +�4�����H���;Ms9��<�����<����A��
u��0���� @��D����@��D�����D����  r؍�H���+�j ��,���PS��H���P��4�@�B ���B  ��,����8���;��:  ��<���+�4���;E�L����   ��D�������   9M�M  ���(�����D�����<��� +�4�����H���;MsF��D�����D����AAf��
u��0���j[f�@@��<�����<���f�@@��<����  r��؍�H���+�j ��,���PS��H���P��4�@�B ���b  ��,����8���;��Z  ��D���+�4���;E�?����@  9M�|  ��D�����<��� +�4���j��H���^;Ms<��D�����D����f��
uj[f���<����<���f�Ɓ�<����  r�3�VVhU  ������Q��H���+��+���P��PVh��  �L�B ��;���   j ��,���P��+�P��5����P��(���� �4�@�B ��t�,���;�����B ��@���;�\��D���+�4�����8���;E�
����?j ��,���Q�u��4����0�@�B ��t��,�����@��� ��8������B ��@�����8��� ul��@��� t-j^9�@���u�ad��� 	   �id���0�?��@����md��Y�1��(�����D@t��4����8u3��$�!d���    �)d���  ������8���+�0���_[�M�3�^�sK����jh�GC ��d���E���u��c���  ��c��� 	   ����   3�;�|;��C r!��c���8�c��� 	   WWWWW�������ɋ����� �C ��������L1��t�P�  Y�}���D0t�u�u�u�.������E���Gc��� 	   �Oc���8�M���E������	   �E��_d����u��  YË�U����C h   ����Y�M�A��t�I�A   ��I�A�A�A   �A�a �]Ë�U��E���u�b��� 	   3�]�V3�;�|;��C r�b��VVVVV� 	   �և����3���ȃ����� �C ���D��@^]Ë�U��EV3�;�u�Vb��VVVVV�    莇���������@^]Ë�U�����}C 3ŉE�SV�u�F@W�6  V����Y�8�C ���t.V����Y���t"V������V�<� �C �y�����Y��Y��Ê@$$<��   V�X���Y���t.V�L���Y���t"V�@�����V�<� �C �0�����Y��Y��Ê@$$<��   V����Y���t.V����Y���t"V�������V�<� �C �������Y��Y����@�t]�u�E�jP�E�P�;  ����t���  �]3�9}�~0�Nx��L=���A���D=�VP�ԉ��YY���t�G;}�|�f�E� �F�x��Ef����EVP�x  YY�M�_^3�[�1H���á�}C ��3�9d�C ����Ë�U���SV�u3�;�t9]t8u�E;�t3�f�3�^[���u�M���K���E�9Xu�E;�tf�f�8]�t�E��`p�3�@�ʍE�P�P��T��YY��t}�E����   ��~%9M| 3�9]��R�uQVj	�p���B ���E�u�M;��   r 8^t���   8]��e����M��ap��Y�����_��� *   8]�t�E��`p�����:���3�9]��P�u�E�jVj	�p���B ���:���뺋�U��j �u�u�u�������]Ë�U��E��t���8��  uP��U��Y]Ë�U�����}C 3ŉE�SV3�W��9h�C u8SS3�GWht�B h   S�,�B ��t�=h�C ���B ��xu
�h�C    9]~"�M�EI8t@;�u�����E+�H;E}@�E�h�C ����  ;���  ����  �]�9] u��@�E �5��B 3�9]$SS�u���u��   P�u �֋�;���  ~Cj�3�X����r7�D?=   w�c����;�t� ��  �P�T��Y;�t	� ��  ���E���]�9]��>  W�u��u�uj�u �օ���   �5,�B SSW�u��u�u�֋ȉM�;���   �E   t)9]��   ;M��   �u�uW�u��u�u���   ;�~Ej�3�X���r9�D	=   w��b����;�tj���  ���P�]S��Y;�t	� ��  �����3�;�tA�u�VW�u��u�u�,�B ��t"SS9]uSS��u�u�u�VS�u �L�B �E�V����Y�u������E�Y�Y  �]�]�9]u��@�E9] u��@�E �u�l  Y�E���u3��!  ;E ��   SS�MQ�uP�u �  ���E�;�tԋ5(�B SS�uP�u�u�։E�;�u3��   ~=���w8��=   w��a����;�t����  ���P�GR��Y;�t	� ��  �����3�;�t��u�SW�\�����u�W�u�u��u�u�։E�;�u3��%�u�E��uPW�u �u���  ���u������#u�W����Y��u�u�u�u�u�u�(�B ��9]�t	�u��zR��Y�E�;�t9EtP�gR��Y�ƍe�_^[�M�3��%C���Ë�U����u�M��G���u(�M��u$�u �u�u�u�u�u�(����� �}� t�M��ap��Ë�U��QQ��}C 3ŉE��l�C SV3�W��;�u:�E�P3�FVht�B V�4�B ��t�5l�C �4��B ��xu
jX�l�C ��l�C ����   ;���   ����   �]�9]u��@�E�5��B 3�9] SS�u���u��   P�u�֋�;���   ~<�����w4�D?=   w��_����;�t� ��  �P�cP��Y;�t	� ��  ���؅�ti�?Pj S��Z����WS�u�uj�u�օ�t�uPS�u�4�B �E�S������E�Y�u3�9]u��@�E9]u��@�E�u�  Y���u3��G;EtSS�MQ�uP�u�  ����;�t܉u�u�u�u�u�u�0�B ��;�tV�hP��Y�Ǎe�_^[�M�3��&A���Ë�U����u�M��E���u$�M��u �u�u�u�u�u�������}� t�M��ap��Ë�U��V�u����  �v��O���v��O���v��O���v��O���v��O���v��O���6��O���v ��O���v$�O���v(�O���v,�O���v0�O���v4�O���v�O���v8�O���v<�O����@�v@�vO���vD�nO���vH�fO���vL�^O���vP�VO���vT�NO���vX�FO���v\�>O���v`�6O���vd�.O���vh�&O���vl�O���vp�O���vt�O���vx�O���v|��N����@���   ��N�����   ��N�����   ��N�����   ��N�����   ��N�����   �N�����   �N�����   �N�����   �N�����   �N�����   �N����,^]Ë�U��V�u��t5�;��C tP�_N��Y�F;ČC tP�MN��Y�v;5ȌC tV�;N��Y^]Ë�U��V�u��t~�F;̌C tP�N��Y�F;ЌC tP�N��Y�F;ԌC tP��M��Y�F;،C tP��M��Y�F;܌C tP��M��Y�F ;��C tP�M��Y�v$;5�C tV�M��Y^]���r���ȋAl;��C t���C �Qpu蒢���@���U��V3�PPPPPPPP�U�I �
�t	���$��u����I ���
�t	���$s���� ^������������U��V3�PPPPPPPP�U�I �
�t	���$��u���
�t���$s�F��� ^�Ë�U����u�M��A���E��~�M��Jf�9 t	AA��u���+�H�u �uP�u�u�u�,�B �}� t�M��ap��Ë�U��MS3�;�v(j�3�X��;Es��U��SSSSS�    �{����3��A�MVW��9]t�u�v^��Y��V�u��Q����YY��t;�s+�Vj �S��U������_^[]�jh�GC �^V��3ۉ]�j�p���Y�]�j_�}�;=��C }W�����ԿC �9tD� �@�tP�  Y���t�E��|(�ԿC ��� P���B �ԿC �4�K��Y�ԿC �G��E������	   �E��V���j����YË�U��SV�u�F�Ȁ�3ۀ�u@�  t9�FW�>+���~,WPV�5���YP������;�u�F��y����F��N ���_�F�f �^��[]Ë�U��V�u��u	V�5   Y�/V�|���Y��t�����F @  tV�����P�  Y��Y��3�^]�jh�GC �U��3��}�}�j����Y�}�3��u�;5��C ��   �ԿC ��98t^� �@�tVPV����YY3�B�U��ԿC ���H���t/9UuP�J���Y���t�E��9}u��tP�/���Y���u	E܉}��   F�3��u�ԿC �4�V����YY��E������   �}�E�t�E��T���j臥��Y�j����Y�j�wC��YË�U����u�M��>���E����   ~�E�Pj�u�Q  ������   �M�H���}� t�M��ap��Ë�U��=ԻC  u�E���C �A��]�j �u����YY]Ë�U����u�M��+>���}�}3���u�u�u�u�4�B �}� t�M��ap��Ë�U��S�]VW����C ���t&P�������FV�5H��YY�G��t�3VP�W�������g �G   ��_^[]� ��U��S�]V����C �C�F���CWt1��t'P������GW��G��YY�F��t�sWP��������	�f ��F_��^[]� �y ��C t	�q�cH��YËA��u��C Ë�U��V��������EtV�:��Y��^]� ��U��3�@�} u3�]�U��SVWUj j h�XB �u�6D  ]_^[��]ËL$�A   �   t2�D$�H�3��8��U�h�P(R�P$R�   ��]�D$�T$��   �SVW�D$UPj�h�XB d�5    ��}C 3�P�D$d�    �D$(�X�p���t:�|$,�t;t$,v-�4v���L$�H�|� uh  �D��I   �D��_   뷋L$d�    ��_^[�3�d�    �y�XB u�Q�R9Qu�   �SQ��C �SQ��C �L$�K�C�kUQPXY]Y[� ������������U��W�}3�������ك��E���8t3�����_�Ë�U���SV�u�M��x;���]�   ;�sT�M胹�   ~�E�PjS�  �M������   �X����t���   ��   �}� t�E��`p����   �E胸�   ~1�]�}�E�P�E%�   P�	D��YY��t�Ej�E��]��E� Y��PO��� *   3Ɉ]��E� A�E�j�p�U�jRQ�M�QV�p�E�P�{�����$���o������E�t	�M�����}� t�M��ap�^[�Ë�U��=ԻC  u�E�H���w�� ]�j �u�����YY]Ë�U���(��}C 3ŉE�SV�uW�u�}�M��&:���E�P3�SSSSW�E�P�E�P�  �E�E�VP�z  ��(�E�u+��u8]�t�E�`p�jX�/��u8]�t�E�`p�j���E�u��E�u�8]�t�E�`p�3��M�_^3�[�5���Ë�U���(��}C 3ŉE�SV�uW�u�}�M��~9���E�P3�SSSSW�E�P�E�P�g  �E�E�VP�  ��(�E�u+��u8]�t�E�`p�jX�/��u8]�t�E�`p�j���E�u��E�u�8]�t�E�`p�3��M�_^3�[��4���Ë�U��MSV�u3�W�y;�u�ZM��j^�0SSSSS�r�������   9]v݋U;ӈ~���3�@9Ew�"M��j"Y�����;��0�F~�:�t��G�j0Y�@J;��M;ӈ|�?5|�� 0H�89t�� �>1u�A��~W�V���@PWV�=r����3�_^[]Ë�U��Q�M�ASVW������  #�% �  �߉E�A�	���   �%�� �u���t;�t�� <  �(��  �$3�;�u;�u�Ef�M�P��E��<  �U����������U��E�����P������Ɂ���  ��P��t�M�_^f�H[�Ë�U���0��}C 3ŉE��ES�]V�E�W�EP�E�P����YY�E�Pj j���u�����f��8!  �uЉC�E։�EԉC�E�P�uV������$��t3�PPPPP�o�����M�_�s^��3�[��2���������������WVU3�3�D$�}GE�T$���ڃ� �D$�T$�D$�}G�T$���ڃ� �D$�T$�u(�L$�D$3���؋D$������d$�ȋ��d$��G�؋L$�T$�D$���������u�����d$�ȋD$���r;T$wr;D$v	N+D$T$3�+D$T$My���؃� �ʋӋًȋ�Ou���؃� ]^_� ̀�@s�� s����Ë�3Ҁ����3�3�Ë�U��E�M%����#�V������t1W�}3�;�tVV�*  YY��0J��j_VVVVV�8�io������_��uP�u��t	��)  ����)  YY3�^]Ë�U��j
j �u�A  ��]Ë�U��= �C  V�5 �C u3��cW��u95(�C tS�-  ��uJ�5 �C ��t@�} t:�u�(���Y���'P����Y;�v��<8=uW�uP�K-  ����t�����u�3�_^]Ë�D8���U���SV�u3�W�};�u;�v�E;�t�3��   �E;�t�������v�I��j^SSSSS�0�Sn�������V�u�M��4���E�9X��   f�E��   f;�v6;�t;�vWSV�KI������H��� *   �H��� 8]�t�M��ap�_^[��;�t2;�w,�H��j"^SSSSS�0��m����8]��y����E��`p��m�����E;�t�    8]��%����E��`p������MQSWVj�MQS�]�p�L�B ;�t9]�^����M;�t�����B ��z�D���;��g���;��_���WSV�tH�����O�����U��j �u�u�u�u�|�����]Ë�U��MS3�;�VW|[;��C sS������<� �C �������@t5�8�t0�=�}C u+�tItIuSj��Sj��Sj��<�B ���3���bG��� 	   �jG������_^[]Ë�U��E���u�NG���  �3G��� 	   ���]�V3�;�|";��C s�ȃ����� �C ����@u$�G���0��F��VVVVV� 	   �+l��������� ^]�jh�GC ��G���}����������4� �C �E�   3�9^u6j
贙��Y�]�9^uh�  �FP����YY��u�]��F�E������0   9]�t���������� �C �D8P���B �E��G���3ۋ}j
�t���YË�U��E�ȃ����� �C ���DP���B ]Ë�U�����}C 3ŉE�V3�95 �C tO�=X�C �u�f*  �X�C ���u���  �pV�M�Qj�MQP�D�B ��ug�= �C u���B ��xuω5 �C VVj�E�Pj�EPV�H�B P�L�B �X�C ���t�V�U�RP�E�PQ�@�B ��t�f�E�M�3�^��,����� �C    ���U��QV�uV������E�FY��u�*E��� 	   �N ���  �=  �@t�E��� "   ��t�f ���   �N�����F�F�f �e� Sj���[ÉF�  u,�ܓ���� ;�t�Г����@;�u�u�����Y��uV����Y�F  W��   �F�>�H��N+�+ˉN��~WP�u�}������E��N�� �F�=����M���t���t����������� �C ��8�C �@ tSj j Q�����#����t-�F�]f��j�E�P�u���]f�]��������E�9}�t�N ���  ���%��  _[^�Ë�U���VW�u�M��G/���E�u3�;�t�0;�u,�C��WWWWW�    ��h�����}� t�E�`p�3���  9}t�}|Ƀ}$ËM�S��}��~���   ~�E�P��jP�  �M������   ���B����t�G�ǀ�-u�M���+u�G�E���K  ���B  ��$�9  ��u*��0t	�E
   �4�<xt<Xt	�E   �!�E   �
��u��0u�<xt<XuG�G���   �����3��u���N��t�˃�0���  t1�ˀ�a����w�� ���;Ms�M9E�r'u;�v!�M�} u#�EO�u �} t�}�e� �[�]��]ى]��G닾����u�u=��t	�}�   �w	��u+9u�v&�	B���E� "   t�M����Ej X��ƉE��E��t�8�Et�]��}� t�E�`p��E���E��t�0�}� t�E�`p�3�[_^�Ë�U��3�P�u�u�u9ԻC uh��C �P������]Ë�U�����}C 3ŉE�j�E�Ph  �u�E� �8�B ��u����
�E�P�G���Y�M�3��(���Ë�U���4��}C 3ŉE��E�M�E؋ES�EЋ V�E܋EW3��M̉}��}�;E�_  �5�B �M�QP�֋��B ��t^�}�uX�E�P�u�օ�tK�}�uE�u��E�   ���u�u��8�����YF;�~[�����wS�D6=   w/��E����;�t8� ��  �-WW�u��u�j�u�Ӌ�;�u�3���   P�?6��Y;�t	� ��  ���E���}�9}�t؍6PW�u��@����V�u��u��u�j�u�Ӆ�t�]�;�tWW�uSV�u�W�u�L�B ��t`�]��[�L�B 9}�uWWWWV�u�W�u�Ӌ�;�t<Vj�����YY�E�;�t+WWVPV�u�W�u��;�u�u��[6��Y�}���}��t�MЉ�u��+���Y�E��e�_^[�M�3���&���Ë�U���S3�VW9]��   �u�M���*��9]u.�T?��SSSSS�    �d����8]�t�E��`p������   �};�t˾���9uv(�?��SSSSS�    �Md����8]�t�E��`p����`�E�9Xu�uW�u�#  ��8]�tD�M��ap��;�E� �M�QP�����E����M�QP������G�Mt;�t;�t�+����3�_^[�Ë�U��SV�uW3����;�u�t>��WWWWW�    �c������B�F�t7V�~���V����$  V�����P�$  ����}�����F;�t
P��4��Y�~�~��_^[]�jhHC �?���M��3��u3�;���;�u��=���    WWWWW�)c���������F@t�~�E��?���V譍��Y�}�V�*���Y�E��E������   �ՋuV�����Y�jh8HC �>���E���u�=��� 	   ����   3�;�|;��C r�`=��� 	   SSSSS�b�����Ћ����<� �C ��������L��t�P�O���Y�]���Dt1�u�����YP�T�B ��u��B �E���]�9]�t��<���M���<��� 	   �M���E������	   �E��>����u����YË�U���S�u�M��+(���]�C=   w�E苀�   �X�u�]�}�E�P�E%�   P�1��YY��t�Ej�E��]��E� Y�
3Ɉ]��E� A�E�j�p�p�E�PQ�E�P�E�jP������ ��u8E�t�E��`p�3���E�#E�}� t�M��ap�[�Ë�U���,�E�H
S�ف� �  �M�H�M��H� ���  ���?  ��W�M�E�����u'3�3�9\��u@��|�3��  3��}૫j�X�  �e V�u��}ԥ���5,�C N�N���������с�  ��]��E�yJ���B�|��j3�Y+�@���M����   �E������҅T����|�� u@��|��n�ƙjY#������  �yN���F�e� +�3�B��L���1�u�19ur"9U���t+�e� �L����r�u;�r��s�E�   H�U��M�yщM�M������!�E�@��}jY�|��+�3��} tC�(�C ��+,�C ;�}3��}૫��  ;��  +E��uԋȍ}ख़��¥������  ��yJ���B�e� �e ��������E�    )U��׋]�\���3��#ωM�����M�u�3�u����E�}�u�|Ӌ�j���M�Z+�;�|�1�t����d�� J����}�5,�C N�N���������с�  ��E�yJ���BjY+�3�B��\���M����   ������҅T����|�� u@��|��f�ƙjY#������  �yN���F�e 3�+�B��L���1�<;�r;�s�E   �9�M���t�L����r3�;�r��s3�G�1��HyދM������!�E�@��}jY�|��+�3��0�C A����������  �yJ���B�e� �e ��������E�    )U��׋]�\���3��#ωM�����M�u�3�u����E�}�u�|Ӌ�j���M�Z+�;�|�1�t����d�� J����}�j3�X�Z  ;$�C �0�C ��   3��}૫��M�   �����������  �yJ���B�e� �e ��������E�    )U��׋]�\���3��#ωM�����M�u�3�u����E�}�u�|Ӌ�j���M�Z+�;�|�1�t����d�� J����}�$�C �8�C �3�@�   �8�C �e����؋���������  �yJ���B�e� �e ��������E�    )U��֋M�|����#ΉM�����M}�|���}��M����E�}�}�|Ћ�j���M�Z+�;�|�1�t����d�� J����}�3�^jY+0�C ��M���Ɂ�   �ً4�C ]���@u�M�U�Y��
�� u�M�_[�Ë�U���,�E�H
S�ف� �  �M�H�M��H� ���  ���?  ��W�M�E�����u'3�3�9\��u@��|�3��  3��}૫j�X�  �e V�u��}ԥ���5D�C N�N���������с�  ��]��E�yJ���B�|��j3�Y+�@���M����   �E������҅T����|�� u@��|��n�ƙjY#������  �yN���F�e� +�3�B��L���1�u�19ur"9U���t+�e� �L����r�u;�r��s�E�   H�U��M�yщM�M������!�E�@��}jY�|��+�3��} tC�@�C ��+D�C ;�}3��}૫��  ;��  +E��uԋȍ}ख़��¥������  ��yJ���B�e� �e ��������E�    )U��׋]�\���3��#ωM�����M�u�3�u����E�}�u�|Ӌ�j���M�Z+�;�|�1�t����d�� J����}�5D�C N�N���������с�  ��E�yJ���BjY+�3�B��\���M����   ������҅T����|�� u@��|��f�ƙjY#������  �yN���F�e 3�+�B��L���1�<;�r;�s�E   �9�M���t�L����r3�;�r��s3�G�1��HyދM������!�E�@��}jY�|��+�3��H�C A����������  �yJ���B�e� �e ��������E�    )U��׋]�\���3��#ωM�����M�u�3�u����E�}�u�|Ӌ�j���M�Z+�;�|�1�t����d�� J����}�j3�X�Z  ;<�C �H�C ��   3��}૫��M�   �����������  �yJ���B�e� �e ��������E�    )U��׋]�\���3��#ωM�����M�u�3�u����E�}�u�|Ӌ�j���M�Z+�;�|�1�t����d�� J����}�<�C �P�C �3�@�   �P�C �e����؋���������  �yJ���B�e� �e ��������E�    )U��֋M�|����#ΉM�����M}�|���}��M����E�}�}�|Ћ�j���M�Z+�;�|�1�t����d�� J����}�3�^jY+H�C ��M���Ɂ�   �ًL�C ]���@u�M�U�Y��
�� u�M�_[�Ë�U���|��}C 3ŉE��ES3�V3��E��EF3�W�E��}��]��u��]��]��]��]��]��]��]�9]$u�)1��SSSSS�    �aV����3��O  �U�U��< t<	t<
t<uB��0�B���/  �$�3B �Ȁ�1��wjYJ�݋M$�	���   �	:ujY������+tHHt����  ���jY�E� �  뢃e� jY뙊Ȁ�1�u���v��M$�	���   �	:uj�<+t(<-t$:�t�<C�<  <E~<c�0  <e�(  j�Jj�y����Ȁ�1���R����M$�	���   �	:�T���:��f����U��  �u��<9�}�s
�E�*ÈG��E��B:�}�M$�	���   �	:�]���<+t�<-t��`����}� �u��u�u&��M��B:�t��<9Ճ}�s�E�*ÈG�M��B:�}��*Éu�<	�n���j�����J��M��Ȁ�1��wj	��������+t HHt���;���j�����M��jY�@���j�o����u���B:�t�,1<v�J�(�Ȁ�1��v�:�뽃}  tG����+�J��M�t�HHt��у}� �E����  jX9E�v�}�|�E�O�E��E��}� ��  �Yj
YJ��
�����뾉u�3��<9 k�
���L1Ё�P  	�B:�}���Q  �M��<9�[����B:�}��O����M��E�O�? t�E�P�u��E�P�#  �E�3҃�9U�}��E�9U�uE9U�u+E=P  �#  =�����/  �`�C ��`�E�;���  }�ع��C �E���`9Uu3�f�E�9U���  ��M�3ҋE��}���T���M�;���  k���ظ �  f9r��}�����M��]��U�3��E��EԉE؉E��C
��3uι�  #�#��� �  ��  ��u���f;��!  f;��  ���  f;��
  ��?  f;�w3��EȉE��  3�f;�uA�E����u9u�u9u�u3�f�E���  f;�u!A�C���u9su93u�ủuȉu���  �u��}��E�   �E��U���U���~R�DĉE��C�E��E��U��� �e� �W��4;�r;�s�E�   �}� �w�tf��E��m��M��}� �GG�E��M��}� ����  f��~7�}܅�x+�u؋E��e����������?���  �u؉E�f���f��M����  f��}B��������E�t�E��E܋}؋U��m�������E������N�}؉E�u�9u�tf�M�� �  ��f9U�w�Uԁ��� �� � u4�}��u+�e� �}��u�e� ���  f9U�uf�E�A�f�E���E���Eָ�  f;�r#3�3�f9E��E����E�I��   ��� ���M��;f�E�M�f�EċE؉EƋE܉E�f�M��3�f�����e� H%   � ���e� �Ẽ}� �;����E��MċuƋU����/�E�   �3���  �   �3��E�   ��E�   3�3�3�3��}�E�f�f�G
�E��w�W�M�_^3�[�1����yB YyB �yB �yB 'zB _zB szB �zB �zB 8{B -{B �zB ��U���t��}C 3ŉE�S�]VW�u�}�f��E��U�� �  #��E��A�#�f�}� �]��E���E���E���E���E���E���E���E���E���E���E���E�?�E�   t�C-��C �u�}�f��u1��u-��u)3�f9M�f�����$ �C�C�C0�C 3�@�  f;���   3�@f��   �;�u��t��   @uh C �Sf�}� t��   �u��u;h�C �;�u0��u,h�C �CjP�}�����3���tVVVVV�sM�����C�*h�C �CjP�Q�����3���tVVVVV�GM�����C3��s  �ʋ�i�M  �������Ck�M��������3���f�M�`�C �ۃ�`�E�f�U�u�}�M�����  }���C �ۃ�`�E�����  �E�T�˃������h  k�M����M�� �  f9r���}ĥ��Eĥ�MƉE�3ɉM��M��M�M��H
��3U��  �� �  �U��U�#�#΍4����  f;���  f;���  ���  f;���  ��?  f;�w3��u�u�u���  3�f;�uG�E����u9u�u9u�u3�f�E��  f;�uG�@���u	9pu90t�!u��u��E�   �M��U�ɉU���~U�L����M��E��E���E�� �V��ȃe� �
;�r;�s�E�   �}� �F�tf��E��m��M��}� ��E�FF�E��M��}� ����  f��~;�E�   �u-�E�M��e��������E�E�������  �E�f���f��M����  f��}B��������E�t�E��M��u�U��m������M������H�u�M�u�9E�tf�M�� �  ��f9M�w�M����� �� � u4�}��u+�e� �}��u�e� ���  f9M�uf�E�G�f�E���E���E��  f;���   3�3�f9E��E����E�I��   ��� ���M�3�;��z����M�����?  ��  f;���  �]��E�3��ɉU��U��U�U��U�3�#�#Ё� �  ���4
�]���f;��L  f;��C  ���  f;��5  ��?  f;�wK3��E�E��9  f�E�}�f�E��E�E�E��E�f�}��U���3�3�f9u���H%   � ���E��[���3�f;�uF�E����u9E�u9E�u	f�E���  f;�uF�E����u9E�u	9E��v����E��}��E�   �E��M���M���~J�M؉M��D��M���	�e� �ʋW��
;�r;�s�E�   �}� �_�tf��m�@@�M��}� �GG�E��M��}� ����  f��~7�}���x+�E�M��e��������E����?���  �E�f���f��M����  f��}B��������E�t�E��M��}�U��m�������M������H�}�M�u�9E�tf�M�� �  ��f9M�w�M����� �� � u4�}��u+�e� �}��u�e� ���  f9M�uf�E�F�f�E���E���E��  f;�r#3�3�f9E��E����E�I��   ��� ���M��;f�E�u�f�E��E�E�E��E�f�u��3�f�����e� H%   � ���e� �E��E�U��E��}f�t2����+3�f�� �  f9E��B����$ �B�B0�B �_�����~j_�u������?  3�f�E��E�   �E��]�M��e����؋E������M��]�E�u؅�}2�ށ��   ~(�E�]�M��m�����؋E������N�]�E���؍G�Z�]��E�����   �U��E�u��}ĥ���e��}��e���� ʋU�����֋��4	����U���ȋE���<;�r;�s�F3�;�r��s3�B����tA�Eȍ0�U�;�r;�sAM����ʍ4?�u��u��M������0������C�M��}� �u��E� �K���K�K<5}�M��D�;9u	�0K;]�s�E�;]�sCf� �*؀��ˈX�D �E��M�_^3�[�	���À;0uK;�s��E�;�s�3�f�� �  f9U��@���ʀ��� �P�0�@ ����3���t@��t����t����t����t�� ��   t���˺   #�V�   t#��   t;�t;�u   �   �   �ˁ�   t��   u���^��   t   �3���t��   SVW�   ��t���t   ��t   ��t   �   ��   tǋʾ   #�t;�t;�t;�u `  � @  �    �   _#�^[��   t��   t
;�u �  Ã�@�@�  Ë�U���SVW��}��]�3���tjZ��t����t����t���� t����t��   �ˋ��   #ƿ   t$=   t=   t;�u����   ���   #�t��   u��   ���   ��   t��   �}�M����#�#���E;���   ���
������E��m���}��]�3���tjZ��t����t����t���� t����t��   �ˋ�#�t(=   t=   t;�u��   ���   ���   ��   t��   u��   ���   ��   t��   �U��3�95��C ��  ���}��]��E���yj^�   t���   t���   t���   t���   t��   �Ȼ `  #�t*��    t�� @  t;�u��   ���   ���   �@�  #ǃ�@t-�  t��@u��   ���   ���   �E��#E��#��;�u���   ��/**
 * Romanian translation for bootstrap-datetimepicker
 * Cristian Vasile <cristi.mie@gmail.com>
 */
;(function($){
	$.fn.datetimepicker.dates['ro'] = {
		days: ["Duminică", "Luni", "Marţi", "Miercuri", "Joi", "Vineri", "Sâmbătă", "Duminică"],
		daysShort: ["Dum", "Lun", "Mar", "Mie", "Joi", "Vin", "Sâm", "Dum"],
		daysMin: ["Du", "Lu", "Ma", "Mi", "Jo", "Vi", "Sâ", "Du"],
		months: ["Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"],
		monthsShort: ["Ian", "Feb", "Mar", "Apr", "Mai", "Iun", "Iul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		today: "Astăzi",
		suffix: [],
		meridiem: [],
		weekStart: 1
	};
}(jQuery));
                                                                                                                                                                                                                                                                                                                      �s � �s � �s � �s � �� � �� � �� � �� � �� � �� � �� � ��      �	 						
					
		
				
 	



	
			
	

	





 




					
		 				
					

				

												 		
	
	




		
	
	

								



			 			


	
	
		
	







			


 	
		



	
	






 
	
	

	

	
	


	 
	


	
				 			

		


 
				
	


 
 


					
	 		
	! 	



			
		!							# 	



					#
	
				$ 
	



	
				

$


			



& 
		
			


				
&


			



  ,�  �3  %�3  � f                           Alts @  �]�� K]Z        ���_<�       �9;    �9;�u��U]            ]�� K��u��U                �    � �        @ 
   �6                                                                                                                                                                                                                                                                                                                                                                                                                                          �(C     8|C        ����    @   �%C             X|C 8&C            H&C T&C �(C     X|C        ����    @   8&C             l|C �&C            �&C �&C     l|C         ����    @   �&C             x{C $C             �|C �&C            �&C  'C 0C �(C     �|C        ����    @   �&C             �|C 0'C            @'C L'C �(C     �|C        ����    @   0'C 4}C        ����    @   �'C            �'C h'C �(C                 4}C �'C             �}C �'C            �'C �'C     �}C         ����    @   �'C             |�C (C             (C ,(C H(C     |�C        ����    @   (C ��C         ����    @   d(C            t(C H(C                 ��C d(C             X�C �(C            �(C �(C �(C     @�C         ����    @   �(C            �(C �(C     X�C        ����    @   �(C            �C 8)C             �C 8)C           H)C X*C �)C �)C |)C `)C     ��C        ����    B   @*C ��C       ����    @   �)C            �)C �)C $*C     ��C        ����    @   �)C ��C         ����    B   @*C ȑC        ����    @   *C            *C �)C $*C     ��C         ����    @   @*C            P*C $*C     �C        ����    @   8)C              �C �*C            �*C �*C �*C $*C     �C        ����    @   �*C            �*C �*C $*C      �C        ����    @   �*C             \�C +C             +C h+C 0+C $*C     @�C        ����    @   L+C            \+C 0+C $*C     \�C        ����    @   +C             ��C �+C            �+C �+C �+C �(C     ��C        ����    @   �+C            �+C �+C �(C     ��C        ����    @   �+C             ؒC  ,C            0,C 8,C     ؒC         ����    @    ,C             �C h,C            x,C �,C �,C     ��C        ����    @   �,C            �,C �,C     ��C         ����    @   �,C �C        ����    @   h,C             <�C -C            -C $-C �+C �(C     <�C        ����    @   -C             X�C T-C            d-C t-C �+C �(C     X�C        ����    @   T-C             x�C �-C            �-C �-C �+C �(C     x�C        ����    @   �-C             ��C �-C            .C .C �+C �(C     ��C        ����    @   �-C             ��C D.C            T.C d.C �+C �(C     ��C        ����    @   D.C �� � @� L �X H� n�   � $� G� �� �� ڡ � &� A� d� �� �� Ǣ � 5� X� ~� �� ɣ � � H� n� �� �� ߤ � @� c� �� ԥ �� � O� u� �� ɦ �� � 7� x� �� �� ٧ �� '� c� �� � )� \� �� ̩ � � S� x� �� ت � ;� h� �� ʫ �� +� ]� �� �� �� (� t� �� ȭ � 0� �� �� �� (� Z� �� Ư � H� �� �� � 7� h� �� � � H� �� � 0� �� �� � A� {� �� �                 ����@�B "�   P0C                            ��C �����@               |0C ����    ����       c�B "�   �0C    �0C                ������B     ��B ������B    ��B "�   �0C                                    01C    D1C `1C |1C �1C    �pC     ����              ��C     ����              �pC     ����              �pC     ����                       �1C    �1C �1C `1C |1C �1C    �pC     ����              qC     ����                       $2C    <2C �1C `1C |1C �1C    4qC     ����                       h2C    �2C �1C `1C |1C �1C    \qC     ����           �����B "�   �2C                        �����B     �B "�   �2C                        ����?�B "�   �2C                            �pC ������@             (3C "�   p3C    83C                ����b�B     m�B                  x�B    ��B    ��B ����    ����    ����    6�@     ����    ����    ����    ʹ@     ����    ����    ����    ^�@     ����    ����    ����    �@     ����    ����    ����    ��@     ����    ����    ����    2�@ ������B "�   d4C                        ����ѡB "�   �4C                        ������B "�   �4C                        ����    ����    ����    ��@     ����    ����    ����    ��@ �����B "�   $5C                            ��C ����Q�@ ����    ����                  P5C "�   `5C    p5C                ����\�B "�   �5C                        �����B "�   �5C                            ��C ����C�@               6C ����        ��B ����    "�   $6C    6C                    ��C ����n�@ ����    ����                  `6C "�   p6C    �6C                �����B "�   �6C                        �����B     �B    %�B     -�B "�   �6C                        ����P�B "�   (7C                            ��C ������@               T7C ����    ����       s�B "�   x7C    d7C                ������B "�   �7C                            ��C ������@ ����    ����                  �7C "�   �7C     8C                �����B "�   88C                        ����
�B     �B "�   d8C                            ��C �����A              �8C ����        8�B    @�B ����    "�   �8C    �8C                ����c�B "�    9C                                    <9C    P9C `1C |1C �1C    �yC     ����               ��C �����A ����    ����                  l9C "�   |9C    �9C                ������B "�   �9C                        ����פB "�   �9C                            ��C ����9#A             :C ������B                    �B "�   @:C    ,:C                            �:C    �:C `1C |1C �1C    �zC     ����           ����8�B "�   �:C                        ����    ����    �����/A �/A ����[�B "�   ;C                            ��C ����6A             8;C ����~�B     ��B               "�   \;C    H;C                ������B     ��B    ɥB "�   �;C                        �����B "�   �;C                        �����B "�   <C                                      `<C ����    ����       G�B     �pC �����>A     ��C �����>A "�   H<C    4<C                ����j�B "�   �<C                        ������B "�   �<C                            ��C �����MA             �<C ������B ����    ����    "�    =C    =C                �����B �����B "�   \=C                            ��C �����SA ����    ����                  �=C "�   �=C    �=C                    ��C �����WA               �=C ����    ����       ,�B "�   >C    �=C                ����_�B "�   H>C                            ��C �����YA ����    ����                  t>C "�   �>C    �>C                    ��C �����\A ����    ����                  �>C "�   �>C    �>C                ����ɧB "�   $?C                            ��C ����<dA               P?C ����    ����       ��B "�   t?C    `?C                            �?C    �?C �1C `1C |1C �1C    �wC     ����               ��C �����oA ����    ����                  �?C "�   @C    @C                ����B�B     M�B    X�B "�   L@C                            �pC �����wA             �@C "�   �@C    �@C                ����~�B     ��B            ��B         ����ǨB     ҨB    ݨB     ݨB "�   �@C                            ��C �����~A             <AC �����B                    �B "�   `AC    LAC                ����Q�B "�   �AC                        ������B "�   �AC                        ������B "�   �AC                        ������B     ��B "�   (BC                                    lBC    �BC `1C |1C �1C    �|C     ����               ����    ����    ����?�A C�A �����A �A ����    ����    ����    &�A     ����    ����    ����    ߙA     ����    ����    ����    z�A     ����    ����    ����    ��A     ����    ����    ����    �A     ����    ����    ����    g�A     ����    ����    ����    `�A     ����    ����    ����    K�A     ����    ����    ������A ��A     ����    ����    ����    Z�A ����    i�A ����    ����    ����    �A ����    (�A ����    ����    ����    ��A     ����    ����    ����    ��A     ����    ����    ����    �A     ����    ����    ����    .�A     ����    ����    ����    ��A     ����    ����    ����k�A �A     ����    ����    ������A ��A     ����    ����    �����A �A     ����    ����    ����    B     ����    ����    �����B �B     ����    ����    ����    �B     FB PB ����    ����    ����-B 6B @           B ����    ����                  �EC "�   �EC    �EC                    ����    ����    ����    LB     �B �B ����    ����    ����3B 7B     ����    ����    �����B �B     �B     �FC    �FC �FC     |�C     ����       �B     ��C     ����       �WB ����    ����    ����B 3B     ����    ����    ����    �0B     ����    ����    ����    �5B     ����    ����    ����    �5B     ����    ����    ����    �7B     ����    ����    ����    �>B     ����    ����    ����    �FB     ����    ����    ����    UB     ����    ����    ����    �VB         ^VB ����    ����    ����    �cB     ����    ����    ����    ?lB     ����    ����    ����    !mB     ����    ����    ����    ��B     ����    ����    ������B ҒB     ����    ����    ����(�B <�B ����@�B     H�B "�   �HC                        ����p�B "�   �HC                        ������B "�   IC                        ����ЪB "�   @IC                        ���� �B "�   lIC                        ����0�B "�   �IC                        ����`�B "�   �IC                        ������B "�   �IC                        ������B "�   JC                        �����B "�   HJC                        ���� �B "�   tJC                            ��C ����^.@             �JC ����P�B     X�B               "�   �JC    �JC                    ��C ����x�@             KC ������B ������B               "�   ,KC    KC                ������B "�   pKC                            ��C ����0@             �KC "�   �KC    �KC                �����B     �B           �B        ���� �B "�   LC                        ����P�B     X�B    f�B "�   8LC                        ������B "�   tLC                        ������B "�   �LC                        �����B ������B "�   �LC                        ���� �B ����(�B ����    "�    MC                        ����P�B     X�B    f�B    t�B "�   <MC                        ������B "�   �MC                        �����B "�   �MC                        ���� �B "�   �MC                        ����P�B "�   NC                        ������B "�   0NC                        ������B ������B ����    "�   \NC                        ���� �B     �B     �B "�   �NC                        ����@�B "�   �NC                        ����p�B ����x�B "�    OC                        ������B "�   4OC                        ����аB     ذB "�   `OC                            ��C �����@             �OC "�   �OC    �OC                �����B �����B           �B    '�B    /�B        ����`�B "�   PC                        ������B     ��B    ��B "�   @PC                        ����бB     رB "�   |PC                        ���� �B "�   �PC                        ����@�B "�   �PC                        ����p�B     {�B "�   QC                        "�   `QC                        ������B     ȲB    вB    زB    �B    �B �����B     �B     �B    (�B "�   �QC                        "�   �QC                        ����P�B     X�B    `�B    h�B    p�B    x�B ������B "�   (RC                        ����гB     ۳B    �B "�   TRC                        ���� �B     +�B     6�B "�   �RC                        ����p�B "�   �RC                        ������B "�   �RC                        �����B "�   $SC                           � � �� �S �S                                         �S �S       CreateStdAccessibleObject   LresultFromObject             4U          b �� �W         �g �� �T         di 4� �T         ~i ,� �X         �i H� �T         tj  � lW         �j �� �X         Fk X� <W         Pk ��                     bj Tj Dj 2j $j j j �i �i �i     ni     Fi Ri 2i  i 
i �h �h �h �h �h �h �h �g ~h rh hh Xh Jh :h ,h h h �h     �^ �^ �^ �^ _ _ $_ 0_ <_ J_ \_ n_ ~_ �_ �_ �_ �_ �_ �_ ` $` 6` D` �^ l` |` �` �` �` �` �` �` �` a 6a Pa `a ra �a �a �a �a �a �a �a �a b �^ ~^ l^ `^ L^ :^ ,^ ^ ^ ^ �] �] �] �] �] �] �] v] Z] J] :] "] ] �\ �\ �\ �\ �\ �\ �\ j\ X\ F\ 4\ \ \ �[ �[ �[ �[ �[ �[ �[ ~[ n[ b[ R[ D[ ,[ [ 
[ �Z �Z �Z �Z �Z �Z �Z �Z �Z |Z fZ PZ :Z ,Z Z Z �Y �Y �Y �Y �Y �Y �Y ~Y lY VY FY 6Y &Y R` Y       �  �
  �	  �  �  ��  ��  �  �  ��  �    �j �j �j �j     �g �g �g �g �g �g �g ~g pg ^g Pg Hg <g (g g �f �f �f �f �f �f hf Xf Hf .f "f f f �e �e �e �e �e �e �e �e �e re \e Fe 8e (e e e �d �d �d �d .b <b Nb jb �d �d �d �d td bd Pd @d .d �f zb �b �b �b �b �b �b �b c c *c @c Lc dc tc �c �c �c  d 
d �c �c �c �c �c �c vf     �i �i �i     0k k k �j �j �j      SizeofResource  LockResource  �LoadResource  9FindResourceW MultiByteToWideChar pGetCommandLineW �GetModuleHandleW  !Sleep � CreateThread  ;GetStdHandle  ExpandEnvironmentStringsW �GetModuleFileNameW  ExitProcess hReadFile  �SetFilePointer  AFlushFileBuffers  �GetFileType zWideCharToMultiByte �GetConsoleOutputCP  �SetConsoleOutputCP  �WriteFile C CloseHandle �lstrlenW  �LocalFree HFormatMessageW  �GlobalUnlock  �GlobalLock  �GlobalAlloc �GlobalFree  �SetLastError  �GetLastError   GetProcAddress  �InterlockedDecrement  LFreeLibrary uGetVersionExA �lstrcmpW  �LoadLibraryA  U CompareStringW  �LoadLibraryW  �GlobalDeleteAtom  �GlobalFindAtomW �GlobalAddAtomW  �GetCurrentThreadId  �lstrcmpA  �lstrlenA  �InterlockedIncrement  �InterlockedExchange R CompareStringA  �LoadLibraryExW  �GetLocaleInfoW  � EnumResourceLanguagesW  Z ConvertDefaultLocale  �GetCurrentThread  �SetErrorMode  �GetCurrentProcessId FileTimeToSystemTime  �LocalAlloc  �LeaveCriticalSection  4TlsGetValue � EnterCriticalSection  �GlobalReAlloc �GlobalHandle  �InitializeCriticalSection 2TlsAlloc  5TlsSetValue  LocalReAlloc  � DeleteCriticalSection 3TlsFree �GlobalFlags �GetModuleHandleA  �WritePrivateProfileStringW  LockFile  ?UnlockFile  �SetEndOfFile  �GetFileSize � DuplicateHandle �GetCurrentProcess FindClose $FindFirstFileW  yGetVolumeInformationW �GetFullPathNameW   CreateFileW FileTimeToLocalFileTime �GetFileAttributesW  �GetFileSizeEx �GetFileTime :GetStartupInfoW �HeapAlloc �HeapFree  �RtlUnwind �HeapReAlloc ZRaiseException  ZVirtualProtect  TVirtualAlloc  IGetSystemInfo \VirtualQuery  �HeapSize  SetUnhandledExceptionFilter �GetModuleFileNameA  KFreeEnvironmentStringsW �GetEnvironmentStringsW  �SetHandleCount  9GetStartupInfoA �HeapCreate  WVirtualFree TQueryPerformanceCounter fGetTickCount  OGetSystemTimeAsFileTime -TerminateProcess  >UnhandledExceptionFilter  �IsDebuggerPresent [GetCPInfo RGetACP  GetOEMCP  �IsValidCodePage �InitializeCriticalSectionAndSpinCount kGetTimeZoneInformation  �GetConsoleCP  �GetConsoleMode  �LCMapStringA  �LCMapStringW  =GetStringTypeA  @GetStringTypeW  �GetLocaleInfoA  �SetStdHandle  �WriteConsoleA �WriteConsoleW x CreateFileA �SetEnvironmentVariableA KERNEL32.dll  �MessageBoxW � GetActiveWindow MsgWaitForMultipleObjects PeekMessageW  �TranslateMessage  � DispatchMessageW  kGetSubMenu  BGetMenuItemCount  CGetMenuItemID GGetMenuState  �UnhookWindowsHookEx }GetWindow oGetSystemMetrics  �GetWindowRect �GetWindowPlacement  �IsIconic  �SystemParametersInfoA �SetWindowPos  �SetWindowLongW  �GetWindowLongW  <GetMenu )PtInRect  O CopyRect   CallWindowProcW � DefWindowProcW  cSendMessageW  GetDlgCtrlID  UGetParent  AdjustWindowRectEx  lGetSysColor 6RegisterClassW  GetClassInfoW GetClassInfoExW h CreateWindowExW PostMessageW  GetClientRect �IsWindowVisible zSetForegroundWindow � EnableWindow  SetMenu 1GetKeyState �MapWindowPoints LGetMessagePos MGetMessageTime  � DestroyWindow uGetTopWindow  GetDlgItem  8GetLastActivePopup  %GetForegroundWindow �GetWindowTextW  �IsWindow  $GetFocus  PRemovePropW \GetPropW  �SetPropW  GetClassNameW 	GetClassLongW  CallNextHookEx  �SetWindowsHookExW GetCapture   WinHelpW  �LoadIconW JRegisterWindowMessageW  �ValidateRect  GetCursorPos  NGetMessageW = CheckMenuItem � EnableMenuItem  ModifyMenuW �LoadBitmapW >GetMenuCheckMarkDimensions  �SetMenuItemBitmaps   PostQuitMessage �IsWindowEnabled �GetWindowThreadProcessId  mGetSysColorBrush  LReleaseDC GetDC �LoadCursorW �SetWindowTextW  �ShowWindow  � DestroyMenu E ClientToScreen  �TabbedTextOutW  � DrawTextW � DrawTextExW �GrayStringW pSetCursor : CharUpperW  USER32.dll  �GetDeviceCaps �GetClipBox  �SetTextColor  eSetBkColor  ( CreateBitmap  #ExtTextOutW � DeleteObject  WSaveDC  PRestoreDC {SetMapMode  APtVisible ERectVisible �TextOutW  Escape  ^SelectObject  �SetViewportOrgEx  %OffsetViewportOrgEx �SetViewportExtEx  XScaleViewportExtEx  �SetWindowExtEx  YScaleWindowExtEx  � DeleteDC  �GetStockObject  GDI32.dll 
 GetFileTitleW COMDLG32.dll   ClosePrinter  N DocumentPropertiesW � OpenPrinterW  WINSPOOL.DRV  [RegOpenKeyExW IRegEnumKeyExW hRegQueryValueExW  *RegCloseKey 3RegCreateKeyExW ^RegOpenKeyW iRegQueryValueW  >RegDeleteKeyW JRegEnumKeyW xRegSetValueExW  ADVAPI32.dll  I PathFindFileNameW G PathFindExtensionW  � PathStripToRootW  q PathIsUNCW  SHLWAPI.dll = CoInitialize   CLSIDFromProgID  CoCreateInstance  4 CoGetObject ;StringFromGUID2  CoDisconnectObject  ole32.dll OLEAUT32.dll                                                                                                                                                                    ��@ �B        o�@ ��B     $�C ��B     .?AVCStringArray@@  ��B     .?AVCAfxStringMgr@@ ��B     .?AUIAtlStringMgr@ATL@@ ��B     .?AVCOleException@@ ��B     .?AVCException@@    ��B     .PAVCOleException@@ ��B     .PAVCObject@@   ��B     .PAX    ��B     .PAVCMemoryException@@  ��B     .PAVCSimpleException@@  ��B     .PAVCNotSupportedException@@    ��B     .PAVCInvalidArgException@@  ��B     .?AVCSimpleException@@  ��B     .?AVCMemoryException@@  ��B     .?AVCNotSupportedException@@    ��B     .?AVCInvalidArgException@@      ��B                                                                                                                                                                                                                                                                                 #�  ��B                                                                                                                                                                                                                                                                                 !�  ��B                                                                                                                                                                                                                                                                                 %�  ��B     .?AV_AFX_THREAD_STATE@@ ��B     .?AVCNoTrackObject@@    ��B     .?AVAFX_MODULE_THREAD_STATE@@   ��B     .?AVAFX_MODULE_STATE@@  ��B     .?AVCDllIsolationWrapperBase@@  ��B     .?AVCComCtlWrapper@@    ��B     .?AVCCommDlgWrapper@@   ��B     .?AVCShellWrapper@@ ��B     .?AV_AFX_BASE_MODULE_STATE@@        x���w���v���u���t���s���r���q���p���o���n���m���l���k���j���i���h���g���f���    p�B ��B ��B ��B ��B ��B ��B �B �B ,�B H�B p�B ��B ��B ��B ��B ��B �B  �B ��B     .?AVXAccessible@CWnd@@  ��B     .?AVXAccessibleServer@CWnd@@    ��B     .?AVCWnd@@  ��B     .?AV_AFX_HTMLHELP_STATE@@   ��B     .?AVCTestCmdUI@@    ��B     .?AVCCmdUI@@    ��B     .PAVCUserException@@    ��B     .?AV?$IAccessibleProxyImpl@VCAccessibleProxy@ATL@@@ATL@@    ��B     .?AUIAccessible@@   ��B     .?AUIAccessibleProxy@@  ��B     .?AV?$CMFCComObject@VCAccessibleProxy@ATL@@@@   ��B     .?AVCAccessibleProxy@ATL@@      ��B     .?AV?$CComObjectRootEx@VCComSingleThreadModel@ATL@@@ATL@@   ��B     .?AVCComObjectRootBase@ATL@@    ��B     .?AUIOleWindow@@    ��B     .?AVCWinThread@@    ��B     .PAVCArchiveException@@ ��B     .?AVCArchiveException@@ ������������   x�B �yC ��B ,zC (�B <zC         ��B    ��B    �B    (�B    X�B     ��B @           �B            ��B �   ��B    ��B            ��B     .?AVCWinApp@@   ��B     .?AV?$CArray@VCVariantBoolPair@@ABV1@@@ ��B     .PAVCOleDispatchException@@ ��B     .?AVCOleDispatchImpl@@  ��B     .?AVCOleDispatchException@@ ��B     .?AVCTypeLibCacheMap@@  ��B     .?AVCMapPtrToPtr@@  ��B     .?AVCPtrArray@@ ��B     .?AVCMemFile@@  ��B     .?AVCFile@@ ��B     .?AV?$CArray@W4LoadArrayObjType@CArchive@@ABW412@@@ ��B     .?AUCThreadData@@   ��B     .?AVCGdiObject@@    ��B     .?AVCMenu@@ ��B     .?AVCResourceException@@    ��B     .?AVCUserException@@    ��B     .?AVCDC@@   ��B     .?AVCHandleMap@@    ��B     .?AVCFileException@@    ��B     .PAVCFileException@@    ��B        ��A ��B     �C ��B     .?AVCByteArray@@    A p a r t m e n t   B o t h     F r e e     ����������B     .?AVCObArray@@     �   �        �Z܊��M��`�* �����!�sG��3^�F��5�}+E�ut�X(�TBf6חK��t���3p�B        {�A ��B     �C    ��B ��B     .?AVtype_info@@ ��A N�@���D                                     	               	      
                                                !      5      A      C      P      R      S      W      Y      l      m       p      r   	         �   
   �   
   �   	   �      �      �   )   �      �      �      �      �      �      �                         u�  s�             ��B    T�B 	   (�B 
   ��B    d�B    4�B    �B    ��B    ��B    ��B    L�B    �B    ��B    ��B    h�B     0�B !   8�B "   ��B x   ��B y   t�B z   d�B �   `�B �   P�B       x   
   �����
                                                          ��������                                                                                                                                                                                                                                                                                                                                                   abcdefghijklmnopqrstuvwxyz      ABCDEFGHIJKLMNOPQRSTUVWXYZ                                                                                                                                                                                                                                                                                                                                                                                                                                                       abcdefghijklmnopqrstuvwxyz      ABCDEFGHIJKLMNOPQRSTUVWXYZ                                                                                                                                     ��C �  `�y�!       ��      ��      ����    @~��    �  ��ڣ                        ��      @�      �  ��ڣ                        ��      A�      �  Ϣ� ��[                 ��      @~��    Q  Q�^�  _�j�2                 ������  1~��    |�B ����C                                                                                              ��C             ��C             ��C             ��C             ��C                               ��C         x�B  �B ��B  �C ��C    ��C ��C ��B     �C     �C                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                �VB �VB �VB �VB �VB �VB �VB �VB �VB �VB ��B ��B     .?AVbad_exception@std@@ ��B     .?AVexception@std@@                        �p     ����    PST                                                             PDT                                                             ��C  �C ����        ����        ����   ;   Z   x   �   �   �   �     0  N  m  ����   :   Y   w   �   �   �   �     /  M  l          ��B ��B x�B z�B ��B ��B ��B ��B ��B ��B ��B ��B ��B x�B l�B `�B X�B L�B H�B D�B @�B <�B 8�B 4�B 0�B ,�B (�B $�B  �B �B �B �B  �B ��B 8�B ��B ��B ��B ��B ��B ��B ��B ��B ��B ��B ��B ��B 	          �C .   ��C p�C p�C p�C p�C p�C p�C p�C p�C p�C ��C    .      ��B  �                              ���5      @   �  �   ����             ��������             �@         �@         �@        @�@        P�@        $�@       ���@        ��@     ���4@   ������N@ �p+��ŝi@�]�%��O�@q�וC�)��@���D�����@�<զ��Ix��@o�����G���A��kU'9��p�|B�ݎ�����~�QC��v���)/��&D(�������D������Jz��Ee�Ǒ����Feu��uv�HMXB䧓9;5���SM��]=�];���Z�]�� �T��7a���Z��%]���g����'���]݀nLɛ� �R`�%u    �����������?q=
ףp=
ף�?Zd;�O��n��?��,e�X���?�#�GG�ŧ�?@��il��7��?3=�Bz�Ք���?����a�w̫�?/L[�Mľ����?��S;uD����?�g��9E��ϔ?$#�⼺;1a�z?aUY�~�S|�_?��/�����D?$?��9�'��*?}���d|F��U>c{�#Tw����=��:zc%C1��<!��8�G�� ��;܈X��ㆦ;ƄEB��u7�.:3q�#�2�I�Z9����Wڥ����2�h��R�DY�,%I�-64OS��k%�Y����}�����ZW�<�P�"NKeb�����}�-ޟ���ݦ�
       �D        � 0                                                                                                                                                                                                                     ��B     .?AVCObject@@   ��B     .?AV?$CArray@PAVExposedObject@@PAV1@@@  ��B     .?AUIActiveScriptSiteWindow@@   ��B     .?AUIUnknown@@  ��B     .?AUIActiveScriptSite@@ ��B     .?AVActiveScriptSite@@  ��B     .?AUIDispatch@@ ��B     .?AVCAppEventListener@@ ��B     .?AUIEnumVARIANT@@  ��B     .?AVXEnumVARIANT@CEnumVariant@@ ��B     .?AVCCmdTarget@@    ��B     .?AVCEnumVariant@@  ��B     .PAVCException@@    ��B     .?AVExposedObject@@ ��B     .?AVCOleDispatchDriver@@    ��B     .?AVScriptEngineFactory@@   ��B     .?AVCScriptUtils@@  ��B     .?AVCUnnamedArguments@@ ��B     .?AVCNamedArguments@@   ��B     .?AVCArguments@@    ��B     .?AVCTextStream@@   �����������������������������������������B ʝB                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 