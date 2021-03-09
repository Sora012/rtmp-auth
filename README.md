# rtmp-auth

Custom NGINX RTMP module auth scripts

# Basic Prerequisites

Requires MySQL/MariaDB, PHP, [NGINX RTMP/FLV Module](https://github.com/winshining/nginx-http-flv-module)

# Basic Setup

1. Setup a webserver to listen on 127.0.0.1
2. Edit NGINX Configuration RTMP section to contain:

`on_publish http://127.0.0.1/auth.php;`

`on_publish_done http://127.0.0.1/deauth.php;`

`on_play http://127.0.0.1/play.php;`

3. Import MySQL/MariaDB SQL file
4. Edit the PHP Scripts to point to the proper Database information
5. Edit the SQL Database to contain information for a valid key(s) & username(s).

# OBS

**{IP}** is your servers IP/Domain

**{app}** is the application in the RTMP section

**{Key}** is the live stream key from the MySQL Database

OBS Stream Settings
Server: rtmp://**{IP}**/**{app}**
Stream Key: **{Key}**

### Notes
Don't check "Use Authenication"

**The database should use all lower-case information and keys**
