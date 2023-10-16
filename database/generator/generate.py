import random
import time

def str_time_prop(start, end, format, prop):
    """Get a time at a proportion of a range of two formatted times.

    start and end should be strings specifying times formated in the
    given format (strftime-style), giving an interval [start, end].
    prop specifies how a proportion of the interval to be taken after
    start.  The returned time will be in the specified format.
    """

    stime = time.mktime(time.strptime(start, format))
    etime = time.mktime(time.strptime(end, format))

    ptime = stime + prop * (etime - stime)

    return time.strftime(format, time.localtime(ptime))


def random_date(start, end, format):
    return str_time_prop(start, end, format, random.random())


user_sql = []       #100        #done
admin_sql = []              #done
space_sql = []              #done
question_sql = []           #done
question_vote_sql = []      #done
answer_sql = []             #done
answer_vote_sql = []        #done
comment_sql = []            #done
favourite_sql = []          #done
contact_us_sql = []         #done
report_user_sql = []        #done
report_question_sql = []    #done
report_answer_sql = []      #done
report_comment_sql = []     #done
image_user_sql = []
image_question_sql = []     #20
image_answer_sql = []
image_space_sql = []


### USERS
insertIntoUser = 'INSERT INTO "user" (email, username, name, password, description, city, banned) VALUES (\''
emails = open("emails.txt")
cities = open("cities.txt").read().splitlines()
names = open("names.txt").read().splitlines()
passwords = open("passwords.txt").read().splitlines()
descriptions = open("descriptions.txt").read().splitlines()
booleanList = ["FALSE", "TRUE"]
emailsInOrder = []


usedUsenames = []
while True:
    email = emails.readline()
    email = email[:-1]
    if (email == ""): break
    emailsInOrder.append(email)

    name = random.choice(names)

    username = ""
    splittedName = name.split(" ")
    while True:
        username = "_".join(splittedName)
        username += "_"
        number = random.randint(0, 99)
        username += str(number)
        if username in usedUsenames: continue
        usedUsenames.append(username)
        break

    password = random.choice(passwords)
    description = random.choice(descriptions)
    city = random.choice(cities)
    bannedAux = random.randint(1,100)
    bannedIx = 0
    if bannedAux < 5: bannedIx = 1
    banned = booleanList[bannedIx]

    user_sql.append(insertIntoUser + email + "\', \'" + username + "\', \'" + name + "\', \'" + password + "\', \'" + description + "\', \'" + city + "\', " + banned + ");\n")


### ADMINS
numOfAdmins = random.randint(5,10)
insertIntoAdmin = 'INSERT INTO "admin" (admin_id) VALUES ('
admins = []
for i in range(numOfAdmins):
    while True:
        adminID = random.randint(1, 100)
        if adminID in admins: continue
        break
    admins.append(adminID)
    admin_sql.append(insertIntoAdmin + str(adminID) + ");\n")


### SPACES
space_sql.append('INSERT INTO space (space_name) VALUES (\'science\');\n')
space_sql.append('INSERT INTO space (space_name) VALUES (\'technology\');\n')
space_sql.append('INSERT INTO space (space_name) VALUES (\'engineering\');\n')
space_sql.append('INSERT INTO space (space_name) VALUES (\'maths\');\n')


### QUESTIONS AND ANSWERS
insertIntoQuestion = "INSERT INTO question (question_title, question_body, question_date, belongs, author, archived) VALUES (\'"
insertIntoAnswer = "INSERT INTO answer (answer_body, answer_date, misinformation, author, question_id, highlight) VALUES (\'"
questionTitles = open("questionTitles.txt").read().splitlines()
questionBodies = open("questionBodies.txt").read().splitlines()
questionDates = []
answerDates = []
questionImagesUsed = []
questionOwners = []
answerOwners = []
for i in range(300):
    questionTitle = random.choice(questionTitles)
    questionBody = random.choice(questionBodies)
    questionDate = random_date("2020-01-01 00:00:00", "2021-04-01 23:59:59", "%Y-%m-%d %H:%M:%S")
    questionDates.append(questionDate)
    questionBelongs = random.randint(1, 4)
    questionAuthor = random.randint(1, 100)
    questionArchived = None
    questionImage = i + 1

    if random.randint(1, 300) < 5:
        questionArchived = "TRUE"
    else: questionArchived = "FALSE"

    questionOwners.append(questionAuthor)
    question_sql.append(insertIntoQuestion + questionTitle + "\', \'" + questionBody + "\', TIMESTAMP \'" + questionDate + "\', " + str(questionBelongs) + ", " + str(questionAuthor) + ", " + questionArchived + ");\n")

    answers = []

    if questionTitle == "What animal is this?":
        answers.append('I think that it is a lemur.')
        answers.append('Not sure, but it seems like a monkey.')
    elif questionTitle == "Simplify (5–√+6–√+7–√)(5–√+6–√−7–√)(5–√−6–√+7–√)(−5–√+6–√+7–√) ?":
        answers.append('I dont know if that expression can be simplified..')
    elif questionTitle == "What is the computer RAM?":
        answers.append('The computer RAM is the short term storage for your CPU. It is volatile which means that once the power to it is cut, all of the data on it is erased. It is a lot faster than your storage or hard drive. It is also directly connected to the CPU which means that the CPU has direct access to it.\\nYour hard drive doesn’t have direct access to your CPU. The RAM is like the tool belt and the hard drive is like going to your truck to get something.\\nAnother type of storage is cache which is onboard the CPU. This is the fastest type of memory and is even closer to the CPU. The cache only holds about 10MB(depending on the CPU).\\nThe cache is like the tools in your hand.')
        answers.append('RAM means Random Acces Memory')
        answers.append('It is a Central Processing Unit.')
    elif questionTitle == "What does the cc mean in car motors?":
        answers.append('To answer your simply, cc stands for cubic centimeters- it represents the total capacity or volume of the cylinders in an engine(1000cc= 1L. eg. "1.2L" petrol engines,if you check their specs, you can find "engine displacement= 1193cc" or something in that range). Basically,it represents the amount of fuel-air mixture that can be injected/pumped into the engine at an instant. So, larger the cc or engine displacement,greater the power or torque developed by the engine.\\nHence, cc cannot be used to describe the power of an electric powered vehicle because unlike a normal IC engine which uses a piston-cylinder arrangement (i.e.thermal energy of fuel combustion is converted to the up-down oscillations of the piston,which in turn is converted to a rotary output), electric motors produce rotary output directly.')
        answers.append('CC means carbon copy. It is an email field that allows the sender to copy a message to one or more other addresses besides the main recipient.')
    elif questionTitle == "Why is Alchemy not considered a real science?":
        answers.append('Alchemy is best described as a form of proto-science rather than a distinct science in its own right. This is because, although many observations and theories made by alchemists were based on scientific fact, they often explained these in terms of magic or divine intervention.')
        answers.append('Alchemy is magic.')
        answers.append('Alchemy is SCIENCE.')
        answers.append('David Copperfield disagrees.')
    elif questionTitle == "Why do computers become slow over time?":
        answers.append('To keep things really simple we have to generalize, but lets generalize down to two simple categories.\\nHow what you do makes your computer slower “locally”: Your operating system (OS) keeps logs of operation that happen on your computer. Over millions of those operations, many go wrong, it can often fix those mistakes or it can try to bypass them if it cannot. This is often due to sloppy coding in the OS’s creator part, or that of dozens of other software you might be running on it. As those accumulate, depending on your OS there might be a slow-down that can actually go away if you were to install your OS and applications from scratch.\\nHow what we are doing with our devices gets gradually harder: What you ask your computer to do gets harder/more complicated over time. E.g. browsing the internet these days is pretty intensive from a hardware point of view. Games, especially “the latest and greatest” from visual standpoint, often require the latest and greatest hardware-wise.\\nes, they could dumb it down for older machines, but when the vast majority of their users or at least the users the marketing curators prioritize (it is those that spend the most money ofc) are connected through newer devices, they often optimize the content or the way the content is delivered with the best experience of those in mind. And it makes sense, it is they who pay most of the bill or that will be willing to pay more. People with older machines are 2nd priority.')
        answers.append('You just need to upgrade your PC regularly')
        answers.append('32gb of ram is the new standard')
        answers.append('They don’t. Barring the installation of software that has a higher demand for resources than the older system can deliver most “slow downs” occur because people pick up garbage, usually from the internet, which is generally malware that uses up their available memory\\nAs a result memory management becomes the primary cause of errors and slowing down.\\nThis is also a reason why. In the absence of any analysis, it is generally considered that adding memory will usually improve performance on a system regardless of other factors.')
    elif questionTitle == "How do I multiply numbers in base 2 representation?":
        answers.append('This website will tell you everything you need to know about it: https://www.expii.com/t/base-binary-numbers-9192.')
        answers.append('Try to watch this video: https://www.youtube.com/watch?v=BnchEbti5t0')
        answers.append('Just do it the same way you do with decimal numbers')
    elif questionTitle == "What is the golden ratio?":
        answers.append('Golden ratio, also known as the golden section, golden mean, or divine proportion, in mathematics, the irrational number (1 + Square root of 5)/2, often denoted by the Greek letters, which is approximately equal to 1.618. It is the ratio of a line segment cut into two pieces of different lengths such that the ratio of the whole segment to that of the longer segment is equal to the ratio of the longer segment to the shorter segment. The origin of this number can be traced back to Euclid, who mentions it as the “extreme and mean ratio” in the Elements. In terms of present day algebra, letting the length of the shorter segment be one unit and the length of the longer segment be x units gives rise to the equation (x + 1)/x = x/1; this may be rearranged to form the quadratic equation x2 – x – 1 = 0, for which the positive solution is x = (1 + Square root of 5)/2, the golden ratio.')
        answers.append('I dont think if the golden ratio exists..')
        answers.append('We find the golden ratio when we divide a line into two parts so that: the long part divided by the short part is also equal to the whole length divided by the long part.')
    elif questionTitle == "How does shazam work?":
        answers.append('Every audio sample has whats known as an "acoustic fingerprint", which (like a human fingerprint) is basically a way to identify music based on things like tempo, bandwidth, and other audio features.\\nIt then compares that acoustic fingerprint to the ones in their database, and if there is a "close enough" match, it returns the matched song information.')
        answers.append('Shazam identifies songs based on an audio fingerprint based on a time-frequency graph called a spectrogram. It uses a smartphone or computer´s built-in microphone to gather a brief sample of audio being played. Shazam stores a catalogue of audio fingerprints in a database. The user tags a song for 10 seconds and the application creates an audio fingerprint. Shazam works by analyzing the captured sound and seeking a match based on an acoustic fingerprint in a database of millions of songs.')
    elif questionTitle == "How long does a goldfish live for in an aquarium?":
        answers.append('Goldfish can live for long periods of time if they are fed a varied diet and housed in proper water conditions. The average lifetime of a goldfish is ten to fifteen years.')
        answers.append('Maybe about 2 years')
        answers.append('Since goldfish have been domesticated for thousands of years, we can’t really examine their life expectancy under natural conditions in the wild. We know that their close cousin, the common carp, can live for up to 38 years in protected outdoor ponds and streams, though wild fish probably don’t survive much past 5 to 10 years.')
        answers.append('It depends on the way they are treated. Some important conditions: water conditions, food, environment, etc.')
    elif questionTitle == "Which 3 numbers have the same answer whether they’re added or multiplied together?":
        answers.append('1,2 and 3 because this three are positive numbers and when added and multipled both gives the same answer 6. 1,2 and 3 are the positive integers and the result of their addition and their multiplication is same.')
        answers.append('0,1 and 2.')
        answers.append('Numbers 2, 5, 6.')
    elif questionTitle == "What was the name of the first internet search engine?":
        answers.append('The first tool used for searching content (as opposed to users) on the Internet was Archie. The name stands for "archive" without the "v"., It was created by Alan Emtage computer science student at McGill University in Montreal, Quebec, Canada.')
        answers.append('In 1996, Larry Page and Sergey Brin called their initial search engine "BackRub" named for its analysis of the webs back links. Larrys office was in room 360 of the Gates CS Building, which he shared with several other graduate students, including Sean Anderson, Tamara Munzner, and Lucas Pereira.')
        answers.append('Microsoft Edge.')
    elif questionTitle == "Why do some bridges wobble?":
        answers.append('Normally, a person walking on a well-built bridge wont exert enough force to do anything. But when we join forces, so much is possible. Belykh found that when people change their gait en masse, and there are enough people on the bridge to really put some force behind their new movements, they can cause a wobble.')
        answers.append('Bridges sway from side to side due to wind blowing across them, and they bounce up and down as traf ic or people pass over. Bridges address this swaying and bouncing in much the same manner as trees. When a tree is still a sapling and is hit by strong winds, its elastic nature allows it to bend without cracking.')
        answers.append('I am not a civil engineer so I dont know about it')
    elif questionTitle == "What is your favourite car and why?":
        answers.append('Ford Mustang GT: 5.0 L V8 engine generating 435 horsepower. Tons of torque. Sounds good enough for my daily car. The Mustang is what I’d be driving most of the time, and I reckon I’d be very, very happy about it. The thing’s simply beautiful.')
        answers.append('Jeep Grand Cherokee SRT: 6.4 L HEMI V8 with 475 horsepower. The Grand Cherokee is a must on my list, and would be my alternative daily car for when I needed more space than the Mustang could provide. Of course, I’d drive it plenty besides that. It’s only the best looking SUV I have ever seen, plus it’s a frikkin’ Jeep.')
        answers.append('BMW Alpina B7: 4.4 L Twin V8 engine producing 600 horsepower. BMW is among my favorite brands, and this fearsome blend of power and luxury is what I’d bring out for special occasions. Or when I wanted to show-off, I guess. It’s super effective!')
        answers.append('The car doesnt matter. Only the driver matter!')
        answers.append('Toyota 2000GT: I mean just look at it! It’s one of the best looking cars ever made! And it also had a special DOHC inline 6. Sadly even if i managed to get one (over 1$million dollars. ouch…) i don’t think i’d be able to fit in one because im quite tall.')
    elif questionTitle == "If Mary had 5 cookies but she ate 3 how many does she have left?":
        answers.append('2. 5-3 = 2. If she had 5 and then ate 3, the final result will be 2.')
        answers.append('Maybe 0, because she had 5 and maybe ate the other 2 and then 3. 2 + 3 = 5')
        answers.append('Thats a hard question! I wish I could help you. In my opinion, the final result is 5, but I really dont know.')
    elif questionTitle == "How do we get more energy from the sun?":
        answers.append('I think the most realistic mechanism for getting more energy from the sun is to increase biomass energy schemes. Bio energy crops could produce a significant quantity of solar derived energy if the motivation were there.\\nBio mass has the following adavantages:\\n1. Energy created by burning biomass is CO2 neutral. CO2 produced in combustion is no more than the quantities of CO2 which the bio material broke down while they were growing.\\n2. Biomass is incredibly cheap to "manufacture". You just plant seeds.\\n3. There is no initial manufacturing energy cost. (For a long time photovoltaic solar cells required far more energy to produce than they could ever hope to recoup in their life.\\n4. There are minimal building / construction / equipment area requirements. Large land areas of solar energy collection can be done with woodland / field crops etc. which can still be used for recreational use or production of wood / food etc.\\n5. Biomass energy collectors are rarely objected to by environmentalists / Nimbys etc.')
        answers.append('I guess in general we are using energy absorbed from the Sun in one form or the other. Fossil fuels were formed from dead remains of flora and fauna which once thrived by either photosynthesis (requires sunlight) or feeding on plants. Nowadays more emphasis is laid on use of renewable sources of energy such as wind energy etc. I guess wind energy owes one of the factors to differential heating of different regions which is some form of solar energy converted into different other forms.')
        answers.append('I think we should forget that idea. Non renewable resources should be our main focus!')
    elif questionTitle == "How do I remove my USB safely?":
        answers.append('You can open My Computer or My PC or whatever it is called which shows all your drives. Right click on USB drive and click on Eject.\\nAnother way is, you can do it from notification icons at the down left corner. You will see an icon for USB device, click on it and select “Safely remove --device name--”.\\nI hope you are talking about USB storage device though. Because other USB devices dont need to be safely removed.')
        answers.append('You dont need to remove it safely.')
    elif questionTitle == "What is reverse engineering robotics?":
        pass
    elif questionTitle == "Which country has the most sunlight?":
        answers.append('USA. Yuma, located in western Arizona near the borders with Mexico and California, is the only place on earth confirmed to bask in more than 4000 hours of sunshine a year.')
        answers.append('Check this website: https://www.currentresults.com/Weather-Extremes/sunniest-places-countries-world.php')
        answers.append('Australia maybe.')
        answers.append('Possibly, Egypt.')
    elif questionTitle == "Can computers keep getting faster?":
        answers.append('The laws of physics stop computers getting faster forever. Computers calculate at the tick of an internal clock, so for many years manufacturers made transistors smaller and clocks faster to make them perform more computations per second. However, conventional electronics get too hot if you make them calculate too fast, which is why we no longer see clock speeds increasing much. Instead we now have more and more ‘cores’ – lots of processors all calculating in parallel – to let them do more work in the same time. Which means that yes, computers can and will keep getting faster.')
        answers.append('No they cannot.')
        answers.append('If we consider clock speeds maybe. Right now we hit a limit on clock speed which means we cannot improve it. New CPUs get more done at the same clock speed as older ones')
    elif questionTitle == "Which represents the greater masterpiece of engineering?":
        answers.append('I would judge the finest smartwatch to be a masterpiece of engineering because it requires extensive engineering knowledge of integrated circuits.')
        answers.append('Its impossible to single point the greatest engineering masterpiece since engineering is so general and includes many disciplines.')
        answers.append('Probably the wheel.')
    elif questionTitle == "What’s so weird about prime numbers?":
        answers.append('Prime numbers are weird because of their properties and relations with the number line. For one, every single integer number can be written as a unique product of prime numbers. Thus, in a sense the whole integer number line is contained within the primes. In addition, there are many very interesting mathematical theorems that are intimately linked with primes in a non-trivial manner. For instance, the Riemann hypothesis is an unproven statement in complex analysis, but can be shown to have a very clear link with prime numbers and applications in number theory.')
        answers.append('To me prime numbers are like any other number.')
        answers.append('Why are math people so boring.')
    elif questionTitle == "What makes us human?":
        answers.append('What, in the simplest way possible, makes us human is the Metacognition. We can think about our own thoughts and are aware of being aware. We also introject aspects of other peoples personalities, most notably our parents. Our "identity" can have different parts of our "self" that maybe have different ideas about what we need or how to meet our needs. Those parts can have differing beliefs or emotional reactions, and can also have attitudes towards other parts within the same self. We can be aware of our own conditioning and consciously condition ourselves.')
        answers.append('What makes us humans is that we think we are humans.')
        answers.append('What even is a human?')
    elif questionTitle == "Do software engineering companies prefer MacBooks over other laptops?":
        answers.append('Some companies take a preference on macbooks over other laptops but usually, it comes down to personal preference. People like macs because MacOS is a Unix underneath and the hardware is really really well built. Another thing is that in the open source community you tend to deploy on Linux servers. Unix and Linux work almost exactly the same way so stuff like shell scripts can easily be developed on your mac and then be used on Linux. Basically, the near-linux experience is the biggest reason some companies prefer macbooks over other laptops.')
        answers.append('No. Macbooks are overrated and overpriced pieces of equipment that should never be used in software development.')
        answers.append('Yes, all companies prefer macbooks. There is no reason to ever pick any other laptop over a macbook due to its convenience and near-linux experience.')
    elif questionTitle == "What is the weirdest element of the periodic table?":
        answers.append('Technetium. He has a metallic descent, surrounded by stable elements on all sides. But he has one trait that makes him strange- almost like that wacky cousin in every family.')
        answers.append('Copernicium.')
        answers.append('I would like to say that Francium is without any doubt one of the craziest elements in the periodic table. It is found all the way down in the alkali metal group and this is one of the main reasons for its amazing properties. The reason behind why elements far down in the alkali metal group are so interesting and crazy, as people say, is because they have a valence electron that lies so far away from the nucleus. Because they have their valence electron far away from the nucleus they sit “looser” because the nucleus doesn’t attract them as hard. Therefore, the electron is more prone to leave the atom and react with other substances.')
    elif questionTitle == "Is it possible to obtain a 5th state of matter?":
        answers.append('In 1995, researchers were able to prove that a fifth state of matter — the Bose-Einstein condensate — could be created at very low temperatures. Until recently, this state of aggregation could only be generated using high-vacuum apparatus on Earth and was the state was extremely short-lived due to gravity. However, a German research team has now succeeded in generating and studying the Bose-Einstein condensate using an unmanned space rocket.')
        answers.append('If you want to explore about more about this theme: https://www.forbes.com/sites/startswithabang/2020/06/09/what-are-the-fifth-and-sixth-states-of-matter/?sh=4c2c2c34a7fb')
        answers.append('Probably, combining Messi and Neymar football ability.')
    elif questionTitle == "What’s at the bottom of the ocean?":
        answers.append('In fact we know very little about the bottom of ocean because of the first thing is light does not penetrate and pressure is very high.\\nThe bottom of ocean is the most sensitive layer that is more prone to volcanoes and earthquakes because of tectonic plates motion.\\nThere were many researches made till now but they were unable to tell exactly, what is at the bottom of the ocean.')
        answers.append('Davey Jones’s Locker!')
    elif questionTitle == "How many black holes are there?":
        answers.append('Most stellar black holes, however, are very difficult to detect. Judging from the number of stars large enough to produce such black holes, however, scientists estimate that there are as many as ten million to a billion such black holes in the Milky Way alone.')
        answers.append('When it comes to stellar mass black holes, astronomers estimate there are 10 million to 1 billion in the Milky Way galaxy. On the hunt for these massive objects, scientists often look for different interactions among stars or gases, clues that there might be a black hole in the neighborhood.')
        answers.append('Ask Einstein, he knows the answer for sure')
    elif questionTitle == "What is the universe made of?":
        answers.append('The Universe is thought to consist of three types of substance: normal matter, "dark matter" and "dark energy". Normal matter consists of the atoms that make up stars, planets, human beings and every other visible object in the Universe.')
        answers.append("As of now,we only have thorough knowledge about 5% of the universe,the rest 95% is completely unknown to us. Let me explain it to you in brief -\\nBaryonic matter(normal matter)- This is the stuff that you and I are made of.gluons,baryons,quarks are all the fundamental sub atomic particles that go on to make supermassive stars,neutron stars,planets,galaxies and so on.but the interesting thing to know is this is only 5% of our observable universe.\\nDark matter- As the name suggests,this is the matter that is totally in dark(unknown)to us right now.it consists of 25% of the critical density of our universe. The field of cosmology, astronomy and the whole astrophysics community has been scratching its heads for quite a long time to know its whereabouts.The problem is that dark matter does not interact with our normal matter as is the case with light.The only thing that makes it possible for us to know about its existence is its gravitational effect on normal matter.scientists and researchers have some assumptions about what it could be like,(WIMPS)weakly interacting massive particles,(SIMPS)strongly interacting massive particles but the right thing to say would be we just dont know yet.\\nDark energy - This is the most mysterious form of energy that seems to permeate all of the space(75%).still it is completely unknown to us.we came to know about it through CMB(cosmic microwave background).We know that our universe is expanding since the big bang,but scientists thought that due to the effects of gravity,this expansion will slow down but rather we found that its accelerating. Something is causing it to expand at superluminal rate of speed.This something is what we refer to as dark energy.we do not have any idea on what it could be,but just some hypothesis that its cosmological constant(vacuum energy). scientists are conducting research and experiments on this subject but till now,we havent been able to trace it.")
    elif questionTitle == "Is anybody still using Windows 95 in 2019?":
        answers.append('Yes, some people are still using Windows 95.\\nSome games wont run on anything newer. As well, Windows 95 gets you very close to “real" DOS, even if it isnt an independent, separate DOS; actually, its MS-DOS 7.0, because MS-DOS 6.22 was the last independent DOS that was separate from Windows 3.x.\\nSome people have very old computer hardware and apparently:\\nthey have never heard of Linux,\\ndont know how to use Linux,\\nthe application they need to run wont run under WINE (WINE Is Not an Emulator) on Linux and\\nwon’t run on any more modern operating system (except possibly in a virtualized environment, as I’ll explain below).\\nThey just plain like running Windows 95\\nA combination of the above.\\nThat’s when Windows 95 is run directly on “bare metal”, as opposed to running it in a virtualized environment. However, it is possible, using either VMware Workstation Player or Oracle VirtualBox, to run Window 95 as a “virtual machine”, or VM. Running an operating system as a VM means that the virtualization software tricks the operating system into thinking it’s running directly on the metal-plastic-and-silicon hardware of a computer, when in fact, though it has an image file to load into RAM, the VM is available only as long as the virtualization software is active and the VM has been started and loaded into RAM.\\nIt’s far safer, unless one absolutely must use Windows 95 on bare metal, as in points #3 and #4 above, to run Windows 95 in a virtualized environment. Anyway, Windows 95 won’t run on more modern hardware, and must never run directly on solid-state drive hardware. This is also true of Windows 98, Me, 2000, XP, and Vista (the last of which should never be run period. Ever). These operating systems were not designed for SSD technology and will destroy an SSD very quickly. The only Windows versions that can handle SSDs are Windows 7, 8.0, 8.1, and 10.')
        answers.append('I think nobody uses Windows 95 anymore.')
        answers.append('Yes people still use it, and in more ways than one.\\nPeople who use win95 retail version extremely small number, probably for legacy support. Don’t recommend connecting to internet with it, or it’d catch a stupid amount of malware\\nPeople who use a modified win95 larger number, but the software is custom built, and there is no rush to modernise it. Generally, they aren’t connected to the internet, and more often than not, they aren’t even on an intranet.\\nPeople who use win95 for an unforeseen use this group is pretty small, but they are the cool group. I’ve used it for help with study, I’ve used it for fun, playing older games like doom and of the works.')
    elif questionTitle == "What is blockchain?":
        answers.append('Blockchain seems complicated, and it definitely can be, but its core concept is really quite simple. A blockchain is a type of database. To be able to understand blockchain, it helps to first understand what a database actually is.\\nA database is a collection of information that is stored electronically on a computer system. Information, or data, in databases is typically structured in table format to allow for easier searching and filtering for specific information. What is the difference between someone using a spreadsheet to store information rather than a database?\\nSpreadsheets are designed for one person, or a small group of people, to store and access limited amounts of information. In contrast, a database is designed to house significantly larger amounts of information that can be accessed, filtered, and manipulated quickly and easily by any number of users at once.\\nLarge databases achieve this by housing data on servers that are made of powerful computers. These servers can sometimes be built using hundreds or thousands of computers in order to have the computational power and storage capacity necessary for many users to access the database simultaneously. While a spreadsheet or database may be accessible to any number of people, it is often owned by a business and managed by an appointed individual that has complete control over how it works and the data within it.\\nIf you want to know more details: https://www.investopedia.com/terms/b/blockchain.asp')
        answers.append('A blockchain is a digital record of transactions. The name comes from its structure, in which individual records, called blocks, are linked together in single list, called a chain. Blockchains are used for recording transactions made with cryptocurrencies, such as Bitcoin, and have many other applications.')
        answers.append('Isnt blockchain a heavy metal band? I think I heard some songs made by them..')
    elif questionTitle == "Show that 120∣n5−5n3+4n ?":
        answers.append('Direct proof: n^5−5.n^3+4.n=(n−2)(n−1)(n)(n+1)(n+2). 120=2^3.3.5. Among the terms n−2,n−1,…,n+2 at least one of them will be divisible by five, at least one will be divisible by three, at least one divisible by four and at least one more other than the one divisible by four will also be divisible by two.')
    elif questionTitle == "If dogs come from wolves where do cats come from?":
        answers.append('Their lineage is uncertain, but it is believed domestic cats separated from their ancestor, the African Wildcat, 130,000 years ago. They are very similar in appearance and share a lot of common genetics.')
        answers.append('They come from tigers!')
        answers.append('Domesticated cats all come from wildcats called Felis silvestris lybica that originated in the Fertile Crescent in the Near East Neolithic period and in ancient Egypt in the Classical period.')

    numImagesWithAnswer = 100
    for answerTitle in answers:
        answersLine = insertIntoAnswer + answerTitle + "\', TIMESTAMP \'"

        answerDate = random_date(questionDate, "2021-04-01 23:59:59", "%Y-%m-%d %H:%M:%S")
        answerDates.append(answerDate)

        answersLine += answerDate

        misinformationAux = random.randint(1, 100)
        if misinformationAux < 5: answersLine += "\', true, "
        else: answersLine += "\', false, "

        user_id = random.randint(1, 100)
        answersLine += str(user_id) + ", "

        hasImage = random.randint(1, 100)
        answersLine += str(i + 1) + ", "

        highlight = random.randint(0, 1)
        if highlight: answersLine += "true);\n"
        else: answersLine += "false);\n"
        answer_sql.append(answersLine)
        answerOwners.append(user_id)

### QUESTION VOTES
insertIntoQuestionVote = "INSERT INTO question_vote (question_id, user_id, vote) VALUES ("
questionVotes = []
for i in range(1500):
    while True:
        questionID = random.randint(1, 300)

        userID = random.randint(1, 100)
        while userID == questionOwners[questionID - 1]:
            userID = random.randint(1, 100)

        if (questionID, userID) in questionVotes: continue
        break
    questionVotes.append((questionID, userID))
    voteAux = random.randint(1, 100)
    voteIx = 0
    if voteAux < 70: voteIx = 1
    vote = booleanList[voteIx]
    question_vote_sql.append(insertIntoQuestionVote + str(questionID) + ", " + str(userID) + ", " + vote + ");\n")


### ANSWER VOTES
insertIntoAnswerVote = "INSERT INTO answer_vote (answer_id, user_id, vote) VALUES ("
answerVotes = []
for i in range(3000):
    while True:
        answerID = random.randint(1, len(answer_sql))
        userID = random.randint(1, 100)

        while userID == answerOwners[answerID - 1]:
            userID = random.randint(1, 100)

        if (answerID, userID) in answerVotes: continue
        break
    answerVotes.append((answerID, userID))
    voteAux = random.randint(1, 100)
    voteIx = 0
    if voteAux < 70: voteIx = 1
    vote = booleanList[voteIx]
    answer_vote_sql.append(insertIntoAnswerVote + str(answerID) + ", " + str(userID) + ", " + vote + ");\n")


### COMMENTS
comments = open("commentsAux.txt").read().splitlines()
insertIntoComment = "INSERT INTO comment (comment_body, comment_date, author, answer_id) VALUES (\'"
commentDates = []
commentOwners = []
for i in range(1000):
    comment = random.choice(comments)
    answer_id = random.randint(1, len(answer_sql))
    answerDate = answerDates[answer_id - 1]
    commentLine = insertIntoComment + comment + "\', TIMESTAMP \'"
    commentDate = random_date(answerDate, "2021-04-13 23:59:59", "%Y-%m-%d %H:%M:%S")
    commentDates.append(commentDate)
    commentLine += commentDate + "', "

    user_id = random.randint(1, 100)
    commentLine += str(user_id) + ", "

    commentLine += str(answer_id) + ");\n"
    commentOwners.append(user_id)
    comment_sql.append(commentLine)

### FAVOURITE
insertIntoFavourite = "INSERT INTO favourite (space_id, user_id) VALUES ("
for i in range(100):
    favourites = [False, False, False, False]
    for k in range(4):
        isFavourite = random.randint(0, 1)
        favourites[k] = bool(isFavourite)

    for j in range(4):
        if favourites[j]:
            favourite_sql.append(insertIntoFavourite + str(j + 1) + ", " + str(i + 1) + ");\n")

### CONTACT US
contactUsTitles = open("contact_us_title.txt").read().splitlines()
contactUsBodies = open("contact_us_body.txt").read().splitlines()
insertIntoContacUs = "INSERT INTO contact_us (message_title, message_body, email, contact_us_date, author) VALUES (\'"
emailsUsed = []
for i in range(10):
    messageTitle = random.choice(contactUsTitles)
    messageBody = random.choice(contactUsBodies)
    date = random_date("2020-01-01 00:00:00", "2021-04-13 23:59:59", "%Y-%m-%d %H:%M:%S")
    author = None
    email = ""
    if random.randint(1,100) < 50:
        author = random.randint(1, 100)
        email = emailsInOrder[author - 1]
    else:
        while True:
            email = random.choice(emailsInOrder)
            if email in emailsUsed: continue
            break
    emailsUsed.append(email)
    if author is not None:
        contact_us_sql.append(
            insertIntoContacUs + messageTitle + "\', \'" + messageBody + "\', \'" + email + "\', TIMESTAMP \'" + date + "\', " + str(author) + ");\n")
    else:
        contact_us_sql.append(insertIntoContacUs + messageTitle + "\', \'" + messageBody + "\', \'" + email + "\', TIMESTAMP \'" + date + "\', NULL);\n")

### REPORT_USER
insertIntoReportUser = "INSERT INTO report_user (reported_user, author, report_date) VALUES ("
for i in range(5):
    date = random_date("2020-01-01 00:00:00", "2021-04-13 23:59:59", "%Y-%m-%d %H:%M:%S")
    reportedUser = random.randint(1, 100)
    author = reportedUser
    while author == reportedUser:
        author = random.randint(1,100)
    report_user_sql.append(insertIntoReportUser + str(reportedUser) + ", " + str(author) + ", TIMESTAMP \'" + date + "\');\n")

### REPORT_QUESTION
insertIntoReportQuestion = "INSERT INTO report_question (reported_question, author, report_date) VALUES ("
for i in range(5):
    reportedQuestion = random.randint(1, 300)
    date = random_date(questionDates[reportedQuestion - 1], "2021-04-13 23:59:59", "%Y-%m-%d %H:%M:%S")
    author = random.randint(1, 100)
    while author == questionOwners[reportedQuestion - 1]:
        author = random.randint(1, 100)
    report_user_sql.append(insertIntoReportQuestion + str(reportedQuestion) + ", " + str(author) + ", TIMESTAMP \'" + date + "\');\n")

### REPORT_ANSWER
insertIntoReportAnswer = "INSERT INTO report_answer (reported_answer, author, report_date) VALUES ("
for i in range(5):
    reportedAnswer = random.randint(1, len(answer_sql))
    date = random_date(answerDates[reportedAnswer - 1], "2021-04-13 23:59:59", "%Y-%m-%d %H:%M:%S")
    author = random.randint(1, 100)
    while author == answerOwners[reportedAnswer - 1]:
        author = random.randint(1, 100)
    report_user_sql.append(insertIntoReportAnswer + str(reportedAnswer) + ", " + str(author) + ", TIMESTAMP \'" + date + "\');\n")

### REPORT_COMMENT
insertIntoReportComment = "INSERT INTO report_comment (reported_comment, author, report_date) VALUES ("
for i in range(5):
    reportedComment = random.randint(1, 1000)
    date = random_date(commentDates[reportedComment - 1], "2021-04-13 23:59:59", "%Y-%m-%d %H:%M:%S")
    author = random.randint(1, 100)
    while author == commentOwners[reportedComment - 1]:
        author = random.randint(1, 100)
    report_user_sql.append(
        insertIntoReportComment + str(reportedComment) + ", " + str(author) + ", TIMESTAMP \'" + date + "\');\n")


output = open("generated.sql", "w")

for user in user_sql:
    output.write(user)

output.write("\n")

for image_user in image_user_sql:
    output.write(image_user)

output.write("\n")

for image_question in image_question_sql:
    output.write(image_question)

output.write("\n")

for image_answer in image_answer_sql:
    output.write(image_answer)

output.write("\n")

for image_space in image_space_sql:
    output.write(image_space)

output.write("\n")

for admin in admin_sql:
    output.write(admin)

output.write("\n")

for space in space_sql:
    output.write(space)

output.write("\n")

for question in question_sql:
    output.write(question)

output.write("\n")

for question_vote in question_vote_sql:
    output.write(question_vote)

output.write("\n")

for answer in answer_sql:
    output.write(answer)

output.write("\n")

for answer_vote in answer_vote_sql:
    output.write(answer_vote)

output.write("\n")

for comment in comment_sql:
    output.write(comment)

output.write("\n")

for favourite in favourite_sql:
    output.write(favourite)

output.write("\n")

for contact_us in contact_us_sql:
    output.write(contact_us)

output.write("\n")

for report_user in report_user_sql:
    output.write(report_user)

output.write("\n")

for report_question in report_question_sql:
    output.write(report_question)

output.write("\n")

for report_answer in report_answer_sql:
    output.write(report_answer)

output.write("\n")

for report_comment in report_comment_sql:
    output.write(report_comment)

output.write("\n")

output.write("INSERT INTO \"user\" (email, username, name, password, description, city, banned) VALUES ('discussly_team@gmail.com', 'discussly', 'Discussly Team', '$2y$10$I0LJuRoqEbFzaxqZl1Crxe8PFFPAPgu.fjrA2Gq6JEmVrMQzIOfve', 'We are the Discussly team! Enjoy!', 'Porto, Portugal', FALSE);")
output.write("INSERT INTO \"admin\" (admin_id) VALUES (101);")
