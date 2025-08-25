#!/usr/bin/env python

#http://kitchingroup.cheme.cmu.edu/blog/2015/04/03/Getting-data-from-the-Scopus-API/
print "hello SB"

import requests
import json
MY_API_KEY = "9cd2551192dde4abb70750d6bc89547e"

resp = requests.get("http://api.elsevier.com/content/author?author_id=19638592200&view=metrics",
                    headers={'Accept':'application/json',
                             'X-ELS-APIKey': MY_API_KEY})

print json.dumps(resp.json(),
                 sort_keys=True,
                 indent=4, separators=(',', ': '))
