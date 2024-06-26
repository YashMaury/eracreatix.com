

/**
 * Initialisation options that can be given to DataTables at initialisation 
 * time.
 *  @namespace
 */
DataTable.defaults = {
	/**
	 * An array of data to use for the table, passed in at initialisation which 
	 * will be used in preference to any data which is already in the DOM. This is
	 * particularly useful for constructing tables purely in Javascript, for
	 * example with a custom Ajax call.
	 *  @type array
	 *  @default null
	 *  @dtopt Option
	 * 
	 *  @example
	 *    // Using a 2D array data source
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "aaData": [
	 *          ['Trident', 'Internet Explorer 4.0', 'Win 95+', 4, 'X'],
	 *          ['Trident', 'Internet Explorer 5.0', 'Win 95+', 5, 'C'],
	 *        ],
	 *        "aoColumns": [
	 *          { "sTitle": "Engine" },
	 *          { "sTitle": "Browser" },
	 *          { "sTitle": "Platform" },
	 *          { "sTitle": "Version" },
	 *          { "sTitle": "Grade" }
	 *        ]
	 *      } );
	 *    } );
	 *    
	 *  @example
	 *    // Using an array of objects as a data source (mData)
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "aaData": [
	 *          {
	 *            "engine":   "Trident",
	 *            "browser":  "Internet Explorer 4.0",
	 *            "platform": "Win 95+",
	 *            "version":  4,
	 *            "grade":    "X"
	 *          },
	 *          {
	 *            "engine":   "Trident",
	 *            "browser":  "Internet Explorer 5.0",
	 *            "platform": "Win 95+",
	 *            "version":  5,
	 *            "grade":    "C"
	 *          }
	 *        ],
	 *        "aoColumns": [
	 *          { "sTitle": "Engine",   "mData": "engine" },
	 *          { "sTitle": "Browser",  "mData": "browser" },
	 *          { "sTitle": "Platform", "mData": "platform" },
	 *          { "sTitle": "Version",  "mData": "version" },
	 *          { "sTitle": "Grade",    "mData": "grade" }
	 *        ]
	 *      } );
	 *    } );
	 */
	"aaData": null,


	/**
	 * If sorting is enabled, then DataTables will perform a first pass sort on 
	 * initialisation. You can define which column(s) the sort is performed upon, 
	 * and the sorting direction, with this variable. The aaSorting array should 
	 * contain an array for each column to be sorted initially containing the 
	 * column's index and a direction string ('asc' or 'desc').
	 *  @type array
	 *  @default [[0,'asc']]
	 *  @dtopt Option
	 * 
	 *  @example
	 *    // Sort by 3rd column first, and then 4th column
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "aaSorting": [[2,'asc'], [3,'desc']]
	 *      } );
	 *    } );
	 *    
	 *    // No initial sorting
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "aaSorting": []
	 *      } );
	 *    } );
	 */
	"aaSorting": [[0,'asc']],


	/**
	 * This parameter is basically identical to the aaSorting parameter, but 
	 * cannot be overridden by user interaction with the table. What this means 
	 * is that you could have a column (visible or hidden) which the sorting will 
	 * always be forced on first - any sorting after that (from the user) will 
	 * then be performed as required. This can be useful for grouping rows 
	 * together.
	 *  @type array
	 *  @default null
	 *  @dtopt Option
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "aaSortingFixed": [[0,'asc']]
	 *      } );
	 *    } )
	 */
	"aaSortingFixed": null,


	/**
	 * This parameter allows you to readily specify the entries in the length drop
	 * down menu that DataTables shows when pagination is enabled. It can be 
	 * either a 1D array of options which will be used for both the displayed 
	 * option and the value, or a 2D array which will use the array in the first 
	 * position as the value, and the array in the second position as the 
	 * displayed options (useful for language strings such as 'All').
	 *  @type array
	 *  @default [ 10, 25, 50, 100 ]
	 *  @dtopt Option
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
	 *      } );
	 *    } );
	 *  
	 *  @example
	 *    // Setting the default display length as well as length menu
	 *    // This is likely to be wanted if you remove the '10' option which
	 *    // is the iDisplayLength default.
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "iDisplayLength": 25,
	 *        "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
	 *      } );
	 *    } );
	 */
	"aLengthMenu": [ 10, 25, 50, 100 ],


	/**
	 * The aoColumns option in the initialisation parameter allows you to define
	 * details about the way individual columns behave. For a full list of
	 * column options that can be set, please see 
	 * {@link DataTable.defaults.columns}. Note that if you use aoColumns to
	 * define your columns, you must have an entry in the array for every single
	 * column that you have in your table (these can be null if you don't which
	 * to specify any options).
	 *  @member
	 */
	"aoColumns": null,

	/**
	 * Very similar to aoColumns, aoColumnDefs allows you to target a specific 
	 * column, multiple columns, or all columns, using the aTargets property of 
	 * each object in the array. This allows great flexibility when creating 
	 * tables, as the aoColumnDefs arrays can be of any length, targeting the 
	 * columns you specifically want. aoColumnDefs may use any of the column 
	 * options available: {@link DataTable.defaults.columns}, but it _must_
	 * have aTargets defined in each object in the array. Values in the aTargets
	 * array may be:
	 *   <ul>
	 *     <li>a string - class name will be matched on the TH for the column</li>
	 *     <li>0 or a positive integer - column index counting from the left</li>
	 *     <li>a negative integer - column index counting from the right</li>
	 *     <li>the string "_all" - all columns (i.e. assign a default)</li>
	 *   </ul>
	 *  @member
	 */
	"aoColumnDefs": null,


	/**
	 * Basically the same as oSearch, this parameter defines the individual column
	 * filtering state at initialisation time. The array must be of the same size 
	 * as the number of columns, and each element be an object with the parameters
	 * "sSearch" and "bEscapeRegex" (the latter is optional). 'null' is also
	 * accepted and the default will be used.
	 *  @type array
	 *  @default []
	 *  @dtopt Option
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "aoSearchCols": [
	 *          null,
	 *          { "sSearch": "My filter" },
	 *          null,
	 *          { "sSearch": "^[0-9]", "bEscapeRegex": false }
	 *        ]
	 *      } );
	 *    } )
	 */
	"aoSearchCols": [],


	/**
	 * An array of CSS classes that should be applied to displayed rows. This 
	 * array may be of any length, and DataTables will apply each class 
	 * sequentially, looping when required.
	 *  @type array
	 *  @default null <i>Will take the values determined by the oClasses.sStripe*
	 *    options</i>
	 *  @dtopt Option
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "asStripeClasses": [ 'strip1', 'strip2', 'strip3' ]
	 *      } );
	 *    } )
	 */
	"asStripeClasses": null,


	/**
	 * Enable or disable automatic column width calculation. This can be disabled
	 * as an optimisation (it takes some time to calculate the widths) if the
	 * tables widths are passed in using aoColumns.
	 *  @type boolean
	 *  @default true
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bAutoWidth": false
	 *      } );
	 *    } );
	 */
	"bAutoWidth": true,


	/**
	 * Deferred rendering can provide DataTables with a huge speed boost when you
	 * are using an Ajax or JS data source for the table. This option, when set to
	 * true, will cause DataTables to defer the creation of the table elements for
	 * each row until they are needed for a draw - saving a significant amount of
	 * time.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      var oTable = $('#example').dataTable( {
	 *        "sAjaxSource": "sources/arrays.txt",
	 *        "bDeferRender": true
	 *      } );
	 *    } );
	 */
	"bDeferRender": false,


	/**
	 * Replace a DataTable which matches the given selector and replace it with 
	 * one which has the properties of the new initialisation object passed. If no
	 * table matches the selector, then the new DataTable will be constructed as
	 * per normal.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Options
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "sScrollY": "200px",
	 *        "bPaginate": false
	 *      } );
	 *      
	 *      // Some time later....
	 *      $('#example').dataTable( {
	 *        "bFilter": false,
	 *        "bDestroy": true
	 *      } );
	 *    } );
	 */
	"bDestroy": false,


	/**
	 * Enable or disable filtering of data. Filtering in DataTables is "smart" in
	 * that it allows the end user to input multiple words (space separated) and
	 * will match a row containing those words, even if not in the order that was
	 * specified (this allow matching across multiple columns). Note that if you
	 * wish to use filtering in DataTables this must remain 'true' - to remove the
	 * default filtering input box and retain filtering abilities, please use
	 * {@link DataTable.defaults.sDom}.
	 *  @type boolean
	 *  @default true
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bFilter": false
	 *      } );
	 *    } );
	 */
	"bFilter": true,


	/**
	 * Enable or disable the table information display. This shows information 
	 * about the data that is currently visible on the page, including information
	 * about filtered data if that action is being performed.
	 *  @type boolean
	 *  @default true
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bInfo": false
	 *      } );
	 *    } );
	 */
	"bInfo": true,


	/**
	 * Enable jQuery UI ThemeRoller support (required as ThemeRoller requires some
	 * slightly different and additional mark-up from what DataTables has
	 * traditionally used).
	 *  @type boolean
	 *  @default false
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bJQueryUI": true
	 *      } );
	 *    } );
	 */
	"bJQueryUI": false,


	/**
	 * Allows the end user to select the size of a formatted page from a select
	 * menu (sizes are 10, 25, 50 and 100). Requires pagination (bPaginate).
	 *  @type boolean
	 *  @default true
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bLengthChange": false
	 *      } );
	 *    } );
	 */
	"bLengthChange": true,


	/**
	 * Enable or disable pagination.
	 *  @type boolean
	 *  @default true
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bPaginate": false
	 *      } );
	 *    } );
	 */
	"bPaginate": true,


	/**
	 * Enable or disable the display of a 'processing' indicator when the table is
	 * being processed (e.g. a sort). This is particularly useful for tables with
	 * large amounts of data where it can take a noticeable amount of time to sort
	 * the entries.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bProcessing": true
	 *      } );
	 *    } );
	 */
	"bProcessing": false,


	/**
	 * Retrieve the DataTables object for the given selector. Note that if the
	 * table has already been initialised, this parameter will cause DataTables
	 * to simply return the object that has already been set up - it will not take
	 * account of any changes you might have made to the initialisation object
	 * passed to DataTables (setting this parameter to true is an acknowledgement
	 * that you understand this). bDestroy can be used to reinitialise a table if
	 * you need.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Options
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      initTable();
	 *      tableActions();
	 *    } );
	 *    
	 *    function initTable ()
	 *    {
	 *      return $('#example').dataTable( {
	 *        "sScrollY": "200px",
	 *        "bPaginate": false,
	 *        "bRetrieve": true
	 *      } );
	 *    }
	 *    
	 *    function tableActions ()
	 *    {
	 *      var oTable = initTable();
	 *      // perform API operations with oTable 
	 *    }
	 */
	"bRetrieve": false,


	/**
	 * Indicate if DataTables should be allowed to set the padding / margin
	 * etc for the scrolling header elements or not. Typically you will want
	 * this.
	 *  @type boolean
	 *  @default true
	 *  @dtopt Options
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bScrollAutoCss": false,
	 *        "sScrollY": "200px"
	 *      } );
	 *    } );
	 */
	"bScrollAutoCss": true,


	/**
	 * When vertical (y) scrolling is enabled, DataTables will force the height of
	 * the table's viewport to the given height at all times (useful for layout).
	 * However, this can look odd when filtering data down to a small data set,
	 * and the footer is left "floating" further down. This parameter (when
	 * enabled) will cause DataTables to collapse the table's viewport down when
	 * the result set will fit within the given Y height.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Options
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "sScrollY": "200",
	 *        "bScrollCollapse": true
	 *      } );
	 *    } );
	 */
	"bScrollCollapse": false,


	/**
	 * Enable infinite scrolling for DataTables (to be used in combination with
	 * sScrollY). Infinite scrolling means that DataTables will continually load
	 * data as a user scrolls through a table, which is very useful for large
	 * dataset. This cannot be used with pagination, which is automatically
	 * disabled. Note - the Scroller extra for DataTables is recommended in
	 * in preference to this option.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bScrollInfinite": true,
	 *        "bScrollCollapse": true,
	 *        "sScrollY": "200px"
	 *      } );
	 *    } );
	 */
	"bScrollInfinite": false,


	/**
	 * Configure DataTables to use server-side processing. Note that the
	 * sAjaxSource parameter must also be given in order to give DataTables a
	 * source to obtain the required data for each draw.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Features
	 *  @dtopt Server-side
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bServerSide": true,
	 *        "sAjaxSource": "xhr.php"
	 *      } );
	 *    } );
	 */
	"bServerSide": false,


	/**
	 * Enable or disable sorting of columns. Sorting of individual columns can be
	 * disabled by the "bSortable" option for each column.
	 *  @type boolean
	 *  @default true
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bSort": false
	 *      } );
	 *    } );
	 */
	"bSort": true,


	/**
	 * Allows control over whether DataTables should use the top (true) unique
	 * cell that is found for a single column, or the bottom (false - default).
	 * This is useful when using complex headers.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Options
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bSortCellsTop": true
	 *      } );
	 *    } );
	 */
	"bSortCellsTop": false,


	/**
	 * Enable or disable the addition of the classes 'sorting_1', 'sorting_2' and
	 * 'sorting_3' to the columns which are currently being sorted on. This is
	 * presented as a feature switch as it can increase processing time (while
	 * classes are removed and added) so for large data sets you might want to
	 * turn this off.
	 *  @type boolean
	 *  @default true
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bSortClasses": false
	 *      } );
	 *    } );
	 */
	"bSortClasses": true,


	/**
	 * Enable or disable state saving. When enabled a cookie will be used to save
	 * table display information such as pagination information, display length,
	 * filtering and sorting. As such when the end user reloads the page the
	 * display display will match what thy had previously set up.
	 *  @type boolean
	 *  @default false
	 *  @dtopt Features
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "bStateSave": true
	 *      } );
	 *    } );
	 */
	"bStateSave": false,


	/**
	 * Customise the cookie and / or the parameters being stored when using
	 * DataTables with state saving enabled. This function is called whenever
	 * the cookie is modified, and it expects a fully formed cookie string to be
	 * returned. Note that the data object passed in is a Javascript object which
	 * must be converted to a string (JSON.stringify for example).
	 *  @type function
	 *  @param {string} sName Name of the cookie defined by DataTables
	 *  @param {object} oData Data to be stored in the cookie
	 *  @param {string} sExpires Cookie expires string
	 *  @param {string} sPath Path of the cookie to set
	 *  @returns {string} Cookie formatted string (which should be encoded by
	 *    using encodeURIComponent())
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function () {
	 *      $('#example').dataTable( {
	 *        "fnCookieCallback": function (sName, oData, sExpires, sPath) {
	 *          // Customise oData or sName or whatever else here
	 *          return sName + "="+JSON.stringify(oData)+"; expires=" + sExpires +"; path=" + sPath;
	 *        }
	 *      } );
	 *    } );
	 */
	"fnCookieCallback": null,


	/**
	 * This function is called when a TR element is created (and all TD child
	 * elements have been inserted), or registered if using a DOM source, allowing
	 * manipulation of the TR element (adding classes etc).
	 *  @type function
	 *  @param {node} nRow "TR" element for the current row
	 *  @param {array} aData Raw data array for this row
	 *  @param {int} iDataIndex The index of this row in aoData
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
	 *          // Bold the grade for all 'A' grade browsers
	 *          if ( aData[4] == "A" )
	 *          {
	 *            $('td:eq(4)', nRow).html( '<b>A</b>' );
	 *          }
	 *        }
	 *      } );
	 *    } );
	 */
	"fnCreatedRow": null,


	/**
	 * This function is called on every 'draw' event, and allows you to
	 * dynamically modify any aspect you want about the created DOM.
	 *  @type function
	 *  @param {object} oSettings DataTables settings object
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnDrawCallback": function( oSettings ) {
	 *          alert( 'DataTables has redrawn the table' );
	 *        }
	 *      } );
	 *    } );
	 */
	"fnDrawCallback": null,


	/**
	 * Identical to fnHeaderCallback() but for the table footer this function
	 * allows you to modify the table footer on every 'draw' even.
	 *  @type function
	 *  @param {node} nFoot "TR" element for the footer
	 *  @param {array} aData Full table data (as derived from the original HTML)
	 *  @param {int} iStart Index for the current display starting point in the 
	 *    display array
	 *  @param {int} iEnd Index for the current display ending point in the 
	 *    display array
	 *  @param {array int} aiDisplay Index array to translate the visual position
	 *    to the full data array
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnFooterCallback": function( nFoot, aData, iStart, iEnd, aiDisplay ) {
	 *          nFoot.getElementsByTagName('th')[0].innerHTML = "Starting index is "+iStart;
	 *        }
	 *      } );
	 *    } )
	 */
	"fnFooterCallback": null,


	/**
	 * When rendering large numbers in the information element for the table
	 * (i.e. "Showing 1 to 10 of 57 entries") DataTables will render large numbers
	 * to have a comma separator for the 'thousands' units (e.g. 1 million is
	 * rendered as "1,000,000") to help readability for the end user. This
	 * function will override the default method DataTables uses.
	 *  @type function
	 *  @member
	 *  @param {int} iIn number to be formatted
	 *  @returns {string} formatted string for DataTables to show the number
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnFormatNumber": function ( iIn ) {
	 *          if ( iIn &lt; 1000 ) {
	 *            return iIn;
	 *          } else {
	 *            var 
	 *              s=(iIn+""), 
	 *              a=s.split(""), out="", 
	 *              iLen=s.length;
	 *            
	 *            for ( var i=0 ; i&lt;iLen ; i++ ) {
	 *              if ( i%3 === 0 &amp;&amp; i !== 0 ) {
	 *                out = "'"+out;
	 *              }
	 *              out = a[iLen-i-1]+out;
	 *            }
	 *          }
	 *          return out;
	 *        };
	 *      } );
	 *    } );
	 */
	"fnFormatNumber": function ( iIn ) {
		if ( iIn < 1000 )
		{
			// A small optimisation for what is likely to be the majority of use cases
			return iIn;
		}

		var s=(iIn+""), a=s.split(""), out="", iLen=s.length;
		
		for ( var i=0 ; i<iLen ; i++ )
		{
			if ( i%3 === 0 && i !== 0 )
			{
				out = this.oLanguage.sInfoThousands+out;
			}
			out = a[iLen-i-1]+out;
		}
		return out;
	},


	/**
	 * This function is called on every 'draw' event, and allows you to
	 * dynamically modify the header row. This can be used to calculate and
	 * display useful information about the table.
	 *  @type function
	 *  @param {node} nHead "TR" element for the header
	 *  @param {array} aData Full table data (as derived from the original HTML)
	 *  @param {int} iStart Index for the current display starting point in the
	 *    display array
	 *  @param {int} iEnd Index for the current display ending point in the
	 *    display array
	 *  @param {array int} aiDisplay Index array to translate the visual position
	 *    to the full data array
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnHeaderCallback": function( nHead, aData, iStart, iEnd, aiDisplay ) {
	 *          nHead.getElementsByTagName('th')[0].innerHTML = "Displaying "+(iEnd-iStart)+" records";
	 *        }
	 *      } );
	 *    } )
	 */
	"fnHeaderCallback": null,


	/**
	 * The information element can be used to convey information about the current
	 * state of the table. Although the internationalisation options presented by
	 * DataTables are quite capable of dealing with most customisations, there may
	 * be times where you wish to customise the string further. This callback
	 * allows you to do exactly that.
	 *  @type function
	 *  @param {object} oSettings DataTables settings object
	 *  @param {int} iStart Starting position in data for the draw
	 *  @param {int} iEnd End position in data for the draw
	 *  @param {int} iMax Total number of rows in the table (regardless of
	 *    filtering)
	 *  @param {int} iTotal Total number of rows in the data set, after filtering
	 *  @param {string} sPre The string that DataTables has formatted using it's
	 *    own rules
	 *  @returns {string} The string to be displayed in the information element.
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $('#example').dataTable( {
	 *      "fnInfoCallback": function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {
	 *        return iStart +" to "+ iEnd;
	 *      }
	 *    } );
	 */
	"fnInfoCallback": null,


	/**
	 * Called when the table has been initialised. Normally DataTables will
	 * initialise sequentially and there will be no need for this function,
	 * however, this does not hold true when using external language information
	 * since that is obtained using an async XHR call.
	 *  @type function
	 *  @param {object} oSettings DataTables settings object
	 *  @param {object} json The JSON object request from the server - only
	 *    present if client-side Ajax sourced data is used
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnInitComplete": function(oSettings, json) {
	 *          alert( 'DataTables has finished its initialisation.' );
	 *        }
	 *      } );
	 *    } )
	 */
	"fnInitComplete": null,


	/**
	 * Called at the very start of each table draw and can be used to cancel the
	 * draw by returning false, any other return (including undefined) results in
	 * the full draw occurring).
	 *  @type function
	 *  @param {object} oSettings DataTables settings object
	 *  @returns {boolean} False will cancel the draw, anything else (including no
	 *    return) will allow it to complete.
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnPreDrawCallback": function( oSettings ) {
	 *          if ( $('#test').val() == 1 ) {
	 *            return false;
	 *          }
	 *        }
	 *      } );
	 *    } );
	 */
	"fnPreDrawCallback": null,


	/**
	 * This function allows you to 'post process' each row after it have been
	 * generated for each table draw, but before it is rendered on screen. This
	 * function might be used for setting the row class name etc.
	 *  @type function
	 *  @param {node} nRow "TR" element for the current row
	 *  @param {array} aData Raw data array for this row
	 *  @param {int} iDisplayIndex The display index for the current table draw
	 *  @param {int} iDisplayIndexFull The index of the data in the full list of
	 *    rows (after filtering)
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
	 *          // Bold the grade for all 'A' grade browsers
	 *          if ( aData[4] == "A" )
	 *          {
	 *            $('td:eq(4)', nRow).html( '<b>A</b>' );
	 *          }
	 *        }
	 *      } );
	 *    } );
	 */
	"fnRowCallback": null,


	/**
	 * This parameter allows you to override the default function which obtains
	 * the data from the server ($.getJSON) so something more suitable for your
	 * application. For example you could use POST data, or pull information from
	 * a Gears or AIR database.
	 *  @type function
	 *  @member
	 *  @param {string} sSource HTTP source to obtain the data from (sAjaxSource)
	 *  @param {array} aoData A key/value pair object containing the data to send
	 *    to the server
	 *  @param {function} fnCallback to be called on completion of the data get
	 *    process that will draw the data on the page.
	 *  @param {object} oSettings DataTables settings object
	 *  @dtopt Callbacks
	 *  @dtopt Server-side
	 * 
	 *  @example
	 *    // POST data to server
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bProcessing": true,
	 *        "bServerSide": true,
	 *        "sAjaxSource": "xhr.php",
	 *        "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
	 *          oSettings.jqXHR = $.ajax( {
	 *            "dataType": 'json', 
	 *            "type": "POST", 
	 *            "url": sSource, 
	 *            "data": aoData, 
	 *            "success": fnCallback
	 *          } );
	 *        }
	 *      } );
	 *    } );
	 */
	"fnServerData": function ( sUrl, aoData, fnCallback, oSettings ) {
		oSettings.jqXHR = $.ajax( {
			"url":  sUrl,
			"data": aoData,
			"success": function (json) {
				if ( json.sError ) {
					oSettings.oApi._fnLog( oSettings, 0, json.sError );
				}
				
				$(oSettings.oInstance).trigger('xhr', [oSettings, json]);
				fnCallback( json );
			},
			"dataType": "json",
			"cache": false,
			"type": oSettings.sServerMethod,
			"error": function (xhr, error, thrown) {
				if ( error == "parsererror" ) {
					oSettings.oApi._fnLog( oSettings, 0, "DataTables warning: JSON data from "+
						"server could not be parsed. This is caused by a JSON formatting error." );
				}
			}
		} );
	},


	/**
	 * It is often useful to send extra data to the server when making an Ajax
	 * request - for example custom filtering information, and this callback
	 * function makes it trivial to send extra information to the server. The
	 * passed in parameter is the data set that has been constructed by
	 * DataTables, and you can add to this or modify it as you require.
	 *  @type function
	 *  @param {array} aoData Data array (array of objects which are name/value
	 *    pairs) that has been constructed by DataTables and will be sent to the
	 *    server. In the case of Ajax sourced data with server-side processing
	 *    this will be an empty array, for server-side processing there will be a
	 *    significant number of parameters!
	 *  @returns {undefined} Ensure that you modify the aoData array passed in,
	 *    as this is passed by reference.
	 *  @dtopt Callbacks
	 *  @dtopt Server-side
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bProcessing": true,
	 *        "bServerSide": true,
	 *        "sAjaxSource": "scripts/server_processing.php",
	 *        "fnServerParams": function ( aoData ) {
	 *          aoData.push( { "name": "more_data", "value": "my_value" } );
	 *        }
	 *      } );
	 *    } );
	 */
	"fnServerParams": null,


	/**
	 * Load the table state. With this function you can define from where, and how, the
	 * state of a table is loaded. By default DataTables will load from its state saving
	 * cookie, but you might wish to use local storage (HTML5) or a server-side database.
	 *  @type function
	 *  @member
	 *  @param {object} oSettings DataTables settings object
	 *  @return {object} The DataTables state object to be loaded
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bStateSave": true,
	 *        "fnStateLoad": function (oSettings) {
	 *          var o;
	 *          
	 *          // Send an Ajax request to the server to get the data. Note that
	 *          // this is a synchronous request.
	 *          $.ajax( {
	 *            "url": "/state_load",
	 *            "async": false,
	 *            "dataType": "json",
	 *            "success": function (json) {
	 *              o = json;
	 *            }
	 *          } );
	 *          
	 *          return o;
	 *        }
	 *      } );
	 *    } );
	 */
	"fnStateLoad": function ( oSettings ) {
		var sData = this.oApi._fnReadCookie( oSettings.sCookiePrefix+oSettings.sInstance );
		var oData;

		try {
			oData = (typeof $.parseJSON === 'function') ? 
				$.parseJSON(sData) : eval( '('+sData+')' );
		} catch (e) {
			oData = null;
		}

		return oData;
	},


	/**
	 * Callback which allows modification of the saved state prior to loading that state.
	 * This callback is called when the table is loading state from the stored data, but
	 * prior to the settings object being modified by the saved state. Note that for 
	 * plug-in authors, you should use the 'stateLoadParams' event to load parameters for 
	 * a plug-in.
	 *  @type function
	 *  @param {object} oSettings DataTables settings object
	 *  @param {object} oData The state object that is to be loaded
	 *  @dtopt Callbacks
	 * 
	 *  @example
	 *    // Remove a saved filter, so filtering is never loaded
	 *    $(document).ready( function() {
	 *      $('#example').dataTable( {
	 *        "bStateSave": true,
	 *        "fnStateLoadParams": function (oSettings, oData) {
	 *          oData.oSearch.sSearch = "";
	 *        }
	 *      } );
	 *    } );
	 * 
	 *  @example
	 *    // Disallow state loading by returning false
	 *    $(document).ready( function() {
	 *