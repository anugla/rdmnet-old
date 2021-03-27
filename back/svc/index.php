<head>
<style>
body {
  font-family: verdana;
}
code pre {
  background-color: rgb(200,200,200);
}
small {
  font-family: monospace;
}
</style>
</head>

<h1>RDMNet API</h1>
All requests are done with HTTP GET apart from /back/svc/secure/ APIs, which uses HTTP POST<br>
<code> <pre>
rdmnet.gq
  /back/ - Backend Directory
    /svc/ - Services
      /secure/ - Secure Services
        OAuth bits
          Bit 5 - Forum posting 
          Bit 4 - Admin powers
          Bit 3 - Modify user 
          Bit 2 - Meta 
          Bit 1 - All (Shows warning)
        auth.php - RDMAuth API, Method string is RDMAuthAPI
          r=0 - Get RDMAuth version
            Returns version number
          r=1 - Login (stage 1), Get key to perform OAuth
            Returns an OAuth key and link.
          r=2 - Login (stage 2), Enter RDMAuth key to get session key
            Returns session key after validating RDMAuth key
          r=3 - Test RDMAuth Key
            Returns true if the key is valid
      api.php - General API, Method string is RDMApi
        r=0 - API Version
          Returns JSON Array with field "version"
        r=1 - Stats
          Return JSON Array with RDMNet Stats
            Example:
              {"posts":2,"users":2,"groups":4,"mods":1,"games":11}
        r=2 - Get Mod by ID
          Returns mod from ID 
        r=3 - Get Game by ID 
          Returns game string from ID
        r=4 - Get Games list
          Returns all games
      forum.php - Forums API, Method string is ForumAPI
        r=0 - Get Forum Post by ID
          Returns forum post with $_GET["id"]
        r=1 - Get Forum Post with ID and return Replies
          Returns forum post and repliest with $_GET["id"]
      uinfo.php - User API, Method string is UserAPI
        r=0 - Grab User Info
          Returns user info with $_GET["id"]
        r=1 - Grab user screen name
          Returns username of user $_GET["id"] with all spaces in the name replaced with periods, and all special characters replaced with # Example: John Doe becomes John.Doe 
</pre> </code>
Responses are stored in this format <br>
<code> <pre>
  "success":boolean
  "code":integer
  "data":object or null
  "method":string
</pre> </code>
<small>RDMNet is ©opy®ight 2021-2022 Psychosis Interactive. Diverge any complaints to the Help forum group. Most content here isnt ours, except for the HTML/CSS/PHP code making up the site. Donut steele!</small>