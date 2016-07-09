import requests
import sys
from bs4 import BeautifulSoup
import json

url = "http://www.basketball-reference.com/play-index/plus/shot_finder.cgi?request=1&player_id=biyombi01&match=single&year_id=2016&is_playoffs=N&team_id=&opp_id=&game_num_min=0&game_num_max=99&game_month=&game_location=&game_result=&shot_pts=&is_make=&shot_type=&shot_distance_min=&shot_distance_max=6&q1=Y&q2=Y&q3=Y&q4=Y&q5=Y&time_remain_minutes=12&time_remain_seconds=0&time_remain_comp=le&margin_min=&margin_max=&c1stat=&c1comp=ge&c1val=&c2stat=&c2comp=ge&c2val=&c3stat=&c3comp=ge&c3val=&order_by=fgx"

r = requests.get(url)
if (r.status_code != 200):
    sys.exit()
soup = BeautifulSoup(r.text)
fgx = soup.select("table.stats_table tbody tr td")[8].string
print json.dumps({"biyombo_fgx": fgx})
