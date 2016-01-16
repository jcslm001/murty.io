Title: Chrome: Create website shortcut apps
----
Date: 20130511
----
Tags: tools
----
Thumbnail: chrome.png
----
Text:

The [Chrome Web Store](https://chrome.google.com/webstore) offers a huge library of free and paid *apps* for use in the [Chrome](https://www.google.com/intl/en/chrome/browser/) browser. However, if you're simply after a quick way to access the key websites you use day to day, creating a shortcut app doesn't require huge amounts of effort.

![Chrome apps sample](/assets/images/chrome-apps.png)
*Some of my current shortcut apps*


Basically, a Chrome shortcut app consists of two files: a plain text JSON file and an PNG image for the icon. These files should be stored in the same folder.

The image should be a 128px x 128px transparent PNG, named **128.png**.

The JSON file is pretty simple, check out the example below and name it **manifest.json**.
Customise this by updating the *name*, *description*, *urls* and *web_url* values as needed.

	{
		"name": "Basecamp",
		"description": "Shortcut to Basecamp Launchpad",
		"manifest_version": 2,
		"version": "1.0.0.0",
		"icons": {
			"128": "128.png"
		},
		"app": {
			"urls": ["https://launchpad.37signals.com/"],
			"launch": {
				"web_url": "https://launchpad.37signals.com/"
			}
		},
		"permissions": ["unlimitedStorage","notifications"]
	}

Now to add this shortcut app to Chrome. From the Chrome menu, select *Tools* > *Extensions*, then click the *Load unpacked extension* button. Browse to the folder in which these files are stored in and press OK/Confirm.

Now when you open a new tab, you should see your new icon! Also, you can customise your shortcut app by right clicking on it. 

![Customise shortcut app](/assets/images/chrome-app-customise.png)
*I think this one deserves a pin*