![](_types/mh_cached_image/ui_icon.png)
# [mh Cached Image](https://github.com/mahotilo/CS.mh_Cached_Image) - Cashed external image. 
## Section type for CustomSections plugin (Typesetter CMS)


## About
The plugin creates a local copy of an external image, e.g. from Google Drive, to speedup image loading. The local copy has an adjustable expiration time.
Cached images are stored in /data/_uploaded/image/mh_cached_image dir as *.dat files. You have to manually clear this folder when changing the image URL. 

## See also 
* [CustomSections](https://github.com/juek/CustomSections)
* [Typesetter on GitHub](https://github.com/Typesetter/Typesetter)
* [Typesetter Home](http://www.typesettercms.com)


## Requirements
* Typesetter CMS
* CustomSections addon installed.

## Manual Installation
1. Download the [master ZIP archive](https://github.com/mahotilo/CS.mh_Cached_Image/archive/master.zip)
2. Upload the extracted folder '_types' to your server into the /addons/CustomSections-master/_types directory


## Demo
### Settings
![image](demo/settings.png)


## License
GPL 2, for bundled thirdparty components see the respective subdirectories.

## Version history
* v1.3
	- make section $section['always_process_values'] = true
* v1.2 
	- always update image in admin mode
* v1.1 
	- alt, id tag added
