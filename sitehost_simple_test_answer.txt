for i in range(1, 101):
  threes = i % 3
  fives = i % 5
  if threes==0 or fives==0:
    if threes==0 and fives==0:
      print("SiteHost")   
    else:
      if threes==0:
        print("Site")
      if fives==0:
        print("Host")     
  else: 
    print(i) 
