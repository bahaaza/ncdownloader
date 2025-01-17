- [English](README.md)
- [简体中文](README.zh-CN.md)

An easy-to-use web interface for Aria2 and youtube-dl

- Search for torrents within the app from mutiple BT sites
- Control Aria2 and manage download tasks from the web;
- Harnessing the power of youtube-dl to download videos from 700+ video sites(youtube,youku,dailymotion,twitter,facebook and the likes;
<img width="800" alt="nc2" src="https://user-images.githubusercontent.com/3911975/132008308-dec2a7ba-4387-441e-9ded-538d61fbccf0.png">
<img width="800" alt="nc4" src="https://user-images.githubusercontent.com/3911975/142444998-54dd54a6-0c8e-4d49-8188-270964a99c50.png">
<img width="800" alt="nc5" src="https://user-images.githubusercontent.com/3911975/142445020-27ec389a-5437-4d28-acc0-5e757fd6897d.png">

### How to use

the latest version has included both youtube-dl and aria2c and there is no need for manual installation (*tested it successfully with snap version of nextcloud both in centos7 and ubuntu 20.04*)   
if for some reason,the builtin binaries don't work for you, then you will need to install them yourself

#### installing aria2 and youtube-dl in ubuntu
```bash
sudo apt install aria2
sudo curl -L https://yt-dl.org/downloads/latest/youtube-dl 4 -o /usr/local/bin/youtube-dl
sudo chmod a+rx /usr/local/bin/youtube-dl
```
local versions will be chosen over the builtin ones.
But you can force the app use a specific version by setting the binary path manually. When the binary is valid, it has the highest priority and all other versions will be ignored

### How to build front-end code

NPM 7.0+ and node 14.0.0+ are required to build front-end scripts

```bash
#start to build
npm run build

#installing php dependencies
composer install
```

#### Nextcloud App homepage
https://apps.nextcloud.com/apps/ncdownloader