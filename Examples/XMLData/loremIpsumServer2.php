<?php
/*
 * A simple server for testing AJAX queries. The "delay" parameter can be
 * used to simulate a slow connection.
 * 
 * Load this page with no parameters to view the API.
 * 
 * Sam Scott, June 2012
 */

$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ipsum turpis, auctor a ultrices vel, semper ut lectus. Sed vestibulum, enim id consectetur sodales, dui mauris mollis mauris, et accumsan sapien odio in velit. Vestibulum nibh lacus, consectetur a rhoncus ut, pharetra sit amet mauris. Proin molestie tellus sed turpis pharetra iaculis. Suspendisse non purus mauris, sed porttitor diam. Nulla pretium, nunc sit amet eleifend mattis, dui nisl facilisis velit, id interdum nibh magna feugiat metus. Curabitur vestibulum, purus vel tincidunt ultricies, lacus augue pellentesque lorem, quis imperdiet elit ante vel sem. Sed ullamcorper imperdiet augue eget vehicula. Morbi euismod risus sit amet nisi hendrerit eget hendrerit nisl aliquam. Integer bibendum gravida nulla, quis cursus justo dictum consectetur.
Duis vehicula elementum bibendum. Etiam ac felis id nisl vestibulum malesuada id euismod nulla. Ut et nisl nec justo porttitor ornare. Sed convallis dapibus nunc, a bibendum eros fermentum vitae. Donec eget massa malesuada purus euismod sodales vel vitae velit. Cras molestie tempor arcu, in facilisis tortor ultrices ut. Pellentesque sit amet urna ut justo aliquam feugiat ac non est. Ut vitae sapien urna. Sed faucibus dolor et odio viverra tempus. Vivamus ullamcorper laoreet dolor nec fermentum. Aenean felis ligula, fringilla eu convallis id, luctus sed mi. Duis non tortor at sem posuere tristique.
Mauris quis accumsan purus. Integer feugiat vulputate ligula et tempor. Nam scelerisque, nunc rhoncus sollicitudin interdum, nisl ligula sollicitudin augue, eu rhoncus velit dui id augue. Aliquam vitae velit mi, sed mattis dui. Fusce adipiscing dolor vitae erat ornare non ultricies risus laoreet. Quisque eget magna in nibh volutpat mattis quis a felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce at ipsum sit amet massa faucibus bibendum.
Cras dictum iaculis felis, ac mollis sem pharetra vehicula. Mauris nec feugiat mauris. Nunc in velit leo. Vestibulum nec eros eros. Integer lobortis, est a bibendum pellentesque, odio orci facilisis felis, sit amet semper arcu urna vel ante. Sed a enim nunc, malesuada tempor tellus. Nunc velit velit, rhoncus quis posuere vel, eleifend eu tellus. Aliquam lorem felis, mollis vel venenatis ac, fringilla congue purus. Donec ullamcorper turpis eget libero gravida egestas sed a lacus. Aenean in magna arcu. Quisque pharetra, ipsum ut rhoncus accumsan, odio neque tristique risus, nec tristique eros felis eget orci. Aenean pretium, mauris quis varius facilisis, leo urna varius sem, sed laoreet mi metus vel elit. Sed volutpat facilisis odio sed dapibus. Etiam libero risus, porttitor id lobortis non, euismod sed arcu.
Nullam molestie sem in lorem varius a convallis sem tincidunt. Etiam at libero at dolor rhoncus tincidunt. Sed cursus sagittis cursus. Pellentesque ante ligula, scelerisque ut euismod non, dapibus ac felis. Fusce rutrum enim ut odio varius at mollis arcu ullamcorper. Donec facilisis varius dui ut ornare. Mauris vitae urna et lacus faucibus facilisis. Curabitur ac felis in metus pulvinar vehicula ut id nulla. Mauris sollicitudin leo nec ligula varius in consequat ipsum elementum. Nulla vulputate imperdiet pulvinar. Fusce vitae leo lacus. Morbi enim sem, accumsan ac convallis non, molestie ac erat.
Cras lorem lorem, tincidunt non pulvinar ut, ultricies quis magna. Fusce sollicitudin, ante quis auctor fermentum, lacus magna mattis mi, ut mattis quam risus sit amet nibh. Morbi eu ante in turpis molestie feugiat et tincidunt erat. Cras arcu velit, ullamcorper et blandit non, mollis vitae arcu. Cras tempus interdum ligula nec pretium. In ullamcorper placerat volutpat. Integer mauris tortor, dictum quis varius eu, congue suscipit nulla. Sed ornare suscipit facilisis. Quisque a sem odio, sed sagittis elit. Integer nec diam nunc. Quisque molestie convallis turpis. Integer dictum mattis sem id sollicitudin. Fusce at velit lacus, at feugiat dui.
Suspendisse dictum adipiscing nunc, vel iaculis magna imperdiet nec. Sed non nulla sed erat cursus luctus. Ut mollis, nisl non molestie vulputate, orci urna dignissim turpis, eu hendrerit lectus velit a erat. Mauris lobortis gravida erat et lacinia. Suspendisse ut nisl in erat condimentum tempus nec vel arcu. Morbi et massa justo, quis lobortis ipsum. Aenean suscipit, nisl sed lobortis pretium, nulla augue placerat erat, vel accumsan erat purus quis purus. Sed feugiat porttitor magna, in fringilla nibh convallis in. Fusce fermentum urna at risus sodales et pretium felis fermentum. Phasellus ipsum mi, blandit in pellentesque quis, malesuada ac tortor. Vestibulum ut lacus metus. Ut condimentum nisl nec mi faucibus euismod. Nunc porta ante ut leo blandit vitae fermentum ante vehicula. Nunc tempus pellentesque odio ut lobortis.
Curabitur tincidunt ante tincidunt sapien tincidunt at egestas dui sodales. Curabitur vitae tempor dui. In consequat massa sed lacus commodo ut adipiscing nulla tempus. Aliquam ultricies nisl ac tellus gravida lobortis. Nullam et auctor quam. Aenean vehicula, lorem eget elementum porta, tellus tortor euismod justo, vestibulum commodo eros nisl ut tortor. Integer pellentesque tincidunt feugiat. Donec lectus justo, scelerisque ac dictum quis, venenatis porttitor sem. Vestibulum ac euismod odio. Phasellus vulputate feugiat sapien, at sagittis tortor convallis sit amet. Curabitur lacinia congue sem quis ornare. Quisque dapibus purus quis tortor imperdiet vitae aliquet lectus posuere.
Donec eget blandit magna. Fusce facilisis, mi at imperdiet hendrerit, nibh velit laoreet nisl, sit amet ornare enim nisl eget nibh. Praesent mi ante, iaculis a vestibulum quis, posuere sit amet mauris. In hac habitasse platea dictumst. Donec aliquam tempus cursus. Aenean ornare, eros nec varius rhoncus, sem eros pretium lacus, vel iaculis massa metus at sem. In vehicula laoreet justo sit amet luctus. Maecenas dictum pulvinar elit vitae facilisis.
Phasellus molestie tempor quam in adipiscing. Etiam non metus ligula, eu pharetra ipsum. Donec dignissim sagittis arcu, dignissim suscipit orci elementum eu. Nunc eleifend nunc et quam facilisis sit amet molestie massa semper. Aenean vitae ipsum ac diam feugiat ullamcorper. Fusce diam lacus, viverra sodales fermentum in, aliquam nec nisl. Donec tempus hendrerit elit, eu mattis magna blandit quis. Proin malesuada leo ac arcu pretium non hendrerit lacus tempor.
Aliquam urna mi, vehicula eget rhoncus nec, sollicitudin nec velit. Maecenas vitae erat et lacus fringilla elementum quis vitae tellus. Aliquam aliquam rhoncus risus, et convallis quam ultrices scelerisque. Proin ac leo purus, a vehicula leo. Praesent vel arcu a nibh fringilla dignissim id ut metus. Nullam aliquam scelerisque dapibus. Aenean eu ipsum a velit facilisis faucibus. Sed semper pulvinar nunc, sit amet ullamcorper est accumsan sed. Aliquam justo tortor, fermentum nec ullamcorper a, iaculis vitae metus.
Nulla malesuada, sapien eget convallis ullamcorper, purus felis pellentesque augue, sit amet lacinia ante erat venenatis massa. Pellentesque sit amet felis sit amet sem porta pharetra non in eros. Praesent vel enim libero. Duis tristique venenatis auctor. In molestie turpis et tortor iaculis adipiscing. Sed egestas nibh vel risus placerat sed sodales dui egestas. Cras mauris lacus, tincidunt ut mollis ut, aliquam et enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque nisi ligula, porta et fringilla quis, aliquet ut mauris. Etiam ligula nulla, tristique vel interdum vel, condimentum sit amet tellus. Quisque vulputate nibh a tellus tincidunt at eleifend lectus imperdiet.
Praesent dapibus rhoncus orci et faucibus. Vestibulum nec nisi sapien. Aliquam vel felis in nisl pharetra accumsan. Donec non erat ligula, in congue lorem. Suspendisse ipsum quam, sodales at interdum non, sollicitudin id mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In vitae eros non lectus pharetra tempor. Praesent tincidunt velit nec felis faucibus a hendrerit ante sagittis. Sed non lectus vel arcu vestibulum blandit eu vel justo.
Duis tortor neque, ullamcorper ut iaculis quis, cursus ut tellus. Vivamus eu purus et sem sodales auctor ut nec justo. Duis ut nibh sit amet nibh hendrerit elementum quis eget sem. Morbi et lectus nec mauris dictum suscipit. Curabitur faucibus elementum augue, ac gravida libero egestas ut. Mauris tristique odio eu quam rutrum id luctus lectus scelerisque. Phasellus in vulputate justo. Ut iaculis sollicitudin ullamcorper. Quisque et sapien accumsan dui tincidunt pretium vel non ligula.
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam hendrerit porttitor nulla sed vestibulum. Etiam quis varius tortor. Vivamus nulla ipsum, sagittis tristique laoreet ut, ullamcorper eu dui. Sed placerat sem quis orci suscipit cursus. Nam condimentum venenatis scelerisque. Nullam bibendum imperdiet massa, sed aliquet nisi dignissim id. Vivamus ut nibh mauris, sit amet porttitor est. Sed erat lectus, interdum id sagittis eget, porta eu augue.
Morbi mi risus, pretium a viverra ut, mollis vel est. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla nec sem eu libero adipiscing congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque ac orci ante, sit amet dictum nibh. Fusce vel ante neque. Quisque adipiscing nulla a neque lacinia mattis. Donec feugiat pulvinar tortor, at luctus nunc mattis non. Donec bibendum neque at ipsum tincidunt commodo. Duis iaculis molestie lacus ac porttitor. Praesent suscipit convallis adipiscing. Curabitur at felis sed lorem elementum vestibulum. Integer pulvinar rhoncus mauris eget vehicula. In condimentum porta est, eu mattis nisl scelerisque at. Maecenas quam leo, facilisis vel mattis quis, sollicitudin nec tortor. Duis eget risus eu est congue auctor.
Sed nec quam quis eros congue convallis quis a tellus. Etiam consectetur tristique porta. Pellentesque ultrices leo ac magna ullamcorper sit amet viverra nisi hendrerit. In hac habitasse platea dictumst. Donec gravida posuere diam ac accumsan. Nulla dolor mauris, blandit sit amet dictum vitae, scelerisque ut mi. Phasellus rhoncus facilisis dui sit amet suscipit. Vivamus et tortor ac metus laoreet fermentum eget nec lacus. Duis vehicula tempus augue quis commodo. Pellentesque lobortis dui nunc.
Proin sollicitudin diam in risus dictum non tincidunt massa sollicitudin. Duis sed neque a enim tristique fermentum ac id felis. Vestibulum ac lorem faucibus erat lacinia pharetra sed eu enim. Aenean metus lectus, laoreet nec pellentesque eu, dictum eu sapien. In at libero dui. Nulla purus augue, iaculis eget mattis sed, fermentum et metus. Donec eleifend scelerisque mollis. Vivamus at enim mauris, nec congue sem. Aenean vulputate magna ac massa ultrices et auctor ipsum gravida. Morbi fermentum mi eu enim rutrum bibendum. Quisque diam arcu, congue nec dignissim vel, mollis ac eros. In non nunc vel nulla molestie mattis non nec magna.
Etiam eget erat ipsum. Vestibulum a ultrices felis. Aenean vulputate eros ullamcorper arcu ornare mattis a eu dolor. Donec placerat mollis nulla vel auctor. Sed tortor libero, molestie euismod euismod at, euismod id orci. Sed mattis porta sem, sed dignissim massa interdum et. Quisque consectetur pellentesque lacus, in imperdiet lacus dignissim vel. Quisque blandit imperdiet ipsum, eget hendrerit nibh sodales eget. Vestibulum quam mi, aliquam non faucibus in, consequat fringilla felis. Vivamus et mauris risus. Donec vestibulum scelerisque condimentum. Sed malesuada dolor quis tortor dignissim accumsan. Proin aliquam purus id ligula gravida feugiat. Maecenas non erat orci, non malesuada dolor. Curabitur gravida feugiat ultrices.
Nunc felis nisi, venenatis vel cursus id, pellentesque a nulla. Proin tincidunt justo eget dolor rutrum auctor. Praesent dolor libero, rhoncus nec vehicula sit amet, rhoncus ullamcorper dui. Nullam gravida auctor leo, eu vestibulum enim auctor eget. In cursus nunc feugiat leo tincidunt dignissim. Morbi a elit vel nulla ultrices auctor. Nulla ullamcorper, purus mollis posuere gravida, elit nulla semper leo, sagittis volutpat augue ligula tristique mi. Proin eu sagittis eros. Integer non erat sapien, et congue ante. Nunc ut velit sit amet eros cursus tempus at et nulla. Maecenas tincidunt aliquet tortor, interdum varius mi lobortis eget. Phasellus venenatis sodales laoreet.
Phasellus rhoncus, dui eget convallis consequat, sem felis consequat ante, nec venenatis nulla enim nec mi. Curabitur eget mauris vitae sem hendrerit fringilla. Donec neque nisi, sollicitudin id vehicula a, mattis ac tortor. Cras risus leo, malesuada at vulputate ac, porttitor quis ipsum. Sed ac rutrum sapien. Duis eget magna ligula, id euismod neque. Mauris et magna at est pretium tincidunt et id felis. Morbi molestie risus fringilla lacus tempus fringilla. Nulla volutpat facilisis velit, quis porta nulla dignissim at. Duis sed elit cursus elit laoreet lacinia.
Etiam commodo consectetur eros, sit amet fermentum lorem faucibus quis. Duis iaculis, dolor a ultrices malesuada, mauris tellus gravida urna, vel sagittis lorem erat ac nisi. Integer in felis massa, sed vehicula dui. Fusce ut nulla vel orci tempor convallis quis in mauris. Ut eleifend, magna vel venenatis blandit, lorem dui tempus neque, quis convallis sapien lacus at velit. Praesent egestas tempus nibh, non porttitor felis venenatis vitae. Cras diam risus, sagittis in adipiscing sit amet, vehicula non mauris. Vivamus fringilla neque sit amet urna luctus et imperdiet lorem porttitor. Nunc bibendum pellentesque scelerisque. Sed et nunc nisi, a pretium sem. Duis dictum tincidunt orci, in iaculis mi vestibulum in. Sed nec sagittis mi. Ut eget odio tortor, et tincidunt eros.
Praesent lobortis arcu at nisi cursus in tincidunt orci posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec dignissim commodo diam, nec feugiat dui blandit eu. Morbi eleifend suscipit felis, ut dignissim odio venenatis non. Curabitur convallis ante id tortor scelerisque gravida. Phasellus orci arcu, pretium id interdum quis, aliquet a diam. Phasellus mi nisl, gravida a pulvinar id, tincidunt vitae felis. Aliquam erat volutpat. Etiam pellentesque sagittis orci eget mattis. Praesent cursus adipiscing congue.
Ut metus ligula, rutrum eu commodo dapibus, elementum vel massa. Nunc eget nisl risus. Suspendisse vulputate consequat velit. Aliquam porttitor enim ut sem vulputate ultricies. Curabitur tincidunt, dui ac placerat malesuada, risus enim eleifend orci, vel aliquet augue urna eu erat. Etiam hendrerit, leo id egestas viverra, diam odio tincidunt nulla, non iaculis neque augue sed tortor. Aenean vitae libero sit amet odio auctor vestibulum. Pellentesque viverra ligula sit amet neque scelerisque eget ultrices tortor condimentum. Morbi vitae nisi ut quam sodales ultrices. Cras quis ante quis tortor sodales dictum eu sit amet nisl. Donec sollicitudin sodales eros, sit amet luctus est consectetur sed. Fusce varius interdum metus vitae blandit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus dui elit, congue ut lacinia vitae, porttitor in tellus. Nunc ultricies dignissim enim, sed luctus orci congue non.
Aliquam facilisis ornare pellentesque. Nam vel dolor sit amet sem tempus scelerisque. Donec pharetra elit vel leo rhoncus ut auctor ligula vulputate. Integer porta scelerisque dui, at euismod nibh sagittis at. Cras ut felis quis arcu dignissim rutrum. Sed vel lectus urna. Curabitur nec scelerisque odio. Cras eget nibh metus. Duis eget justo eros. Nam pretium, ante quis laoreet euismod, neque tortor consequat massa, hendrerit cursus ipsum leo nec sapien. Mauris semper rutrum libero eget varius. Ut posuere, turpis eget congue pretium, felis leo condimentum nunc, sit amet aliquet dui ante at urna. In non lacus non magna tincidunt consequat eu a libero. Sed venenatis molestie ornare. Praesent nec massa in erat consequat malesuada eget vel tellus. Nulla faucibus blandit augue quis iaculis.
Donec dictum suscipit erat vel vulputate. Sed volutpat tellus quis risus aliquet a euismod nunc aliquam. Fusce ante libero, consectetur ut rhoncus quis, scelerisque quis nulla. Nulla mi ante, fermentum eu placerat at, eleifend quis nunc. Integer quis augue metus, at posuere diam. Nam rutrum sodales porta. Maecenas facilisis vulputate velit, in commodo arcu auctor non. Cras tempor pulvinar quam nec pretium. Ut blandit magna in urna tincidunt scelerisque.
Vestibulum lorem erat, venenatis sit amet rutrum a, aliquam sed nunc. Quisque at nunc id leo porta aliquet nec ac est. In velit enim, imperdiet a facilisis eget, laoreet ut ipsum. Nulla ullamcorper volutpat aliquam. Aliquam ante lacus, imperdiet a malesuada et, aliquam id enim. Donec sit amet lorem quis velit pretium gravida quis quis nulla. Vivamus sed volutpat lorem. Nulla vitae semper magna. Morbi ullamcorper leo ac leo faucibus ut suscipit massa tincidunt. Nullam gravida nisi nibh. Donec eget porta libero. Donec lobortis fermentum turpis quis ornare. Donec purus ipsum, ullamcorper sed blandit ac, interdum eu tortor.
Quisque risus quam, tincidunt vitae bibendum fringilla, vulputate in elit. Donec viverra tellus adipiscing est ornare eget ultrices lectus cursus. Aenean et sapien sem, nec blandit justo. Duis orci ante, tincidunt sit amet dignissim et, sagittis in arcu. Donec luctus nunc et nulla interdum sed adipiscing mauris mollis. Curabitur augue dolor, accumsan quis scelerisque vitae, sollicitudin et augue. In metus felis, ornare quis scelerisque a, pharetra ac ipsum. Nullam eu tristique diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus pharetra risus ante. Integer lacus elit, porttitor et imperdiet tempor, blandit at velit. Aliquam erat volutpat. Nam odio nibh, tincidunt id fringilla a, aliquet id elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris accumsan risus erat. Nunc dui ante, mattis vel mollis et, sagittis eu neque.
Integer justo diam, blandit ut elementum nec, fermentum vel odio. Sed scelerisque accumsan sapien, in vehicula risus sollicitudin ac. In hac habitasse platea dictumst. Donec a dui in est tincidunt tempus. Sed rhoncus sagittis lacus at cursus. Aliquam vitae libero sapien, et suscipit nulla. Nam quis odio at nisi vestibulum egestas euismod quis justo. Quisque eget ante vitae magna condimentum placerat. Vestibulum odio sapien, eleifend ac sollicitudin at, tincidunt eu lorem. In vel lectus eget sem lobortis congue. Etiam condimentum consectetur eros vel suscipit. Aliquam elementum ullamcorper molestie. Maecenas ipsum metus, egestas vel vestibulum ut, ultrices sit amet tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam bibendum bibendum quam, at vehicula magna lobortis in.
Nunc lobortis malesuada diam, nec accumsan velit tincidunt non. Suspendisse consequat mattis felis ac laoreet. Duis sit amet metus neque. Quisque in sem malesuada est euismod ullamcorper quis et diam. Phasellus fringilla mollis facilisis. Nunc velit justo, commodo eu molestie nec, feugiat ut odio. Maecenas ante augue, iaculis at tempor ut, lacinia nec erat. Donec pretium odio ut purus interdum ultrices. Vivamus vel viverra nisl. Suspendisse quam nunc, aliquam id commodo at, pellentesque sed ante. Nunc quam erat, dapibus eu laoreet tincidunt, sagittis quis magna. Quisque eu lorem ut nibh eleifend molestie.
Aliquam magna purus, lobortis vitae luctus sed, malesuada ac mauris. Praesent ac justo a lectus tempor lobortis non eget sem. Donec pulvinar auctor egestas. Fusce et velit mauris. Quisque vel magna eget tortor ultrices placerat. Morbi consequat mattis est eget tincidunt. Duis sit amet ligula tellus, non viverra neque. Morbi purus ligula, porta et hendrerit eu, auctor eget arcu. Nullam tincidunt sapien sagittis nisi laoreet imperdiet. Nulla ligula velit, vehicula nec tempor sed, feugiat ac tortor.
Vivamus ultrices scelerisque tortor a ultricies. Vestibulum in metus neque, euismod scelerisque leo. In sed nibh justo. Fusce odio velit, ornare eget hendrerit at, malesuada eu orci. Aliquam id odio nec tellus molestie eleifend ac vel nulla. Curabitur varius odio dictum odio aliquam consectetur. Aliquam iaculis velit non mi vulputate ut faucibus diam eleifend. Nunc ut diam non massa facilisis fermentum non ullamcorper dolor. Nullam eu nisl nibh, a porttitor nisl.
In cursus augue mauris, condimentum cursus arcu. Quisque a ligula at risus faucibus euismod sed ac velit. Etiam sollicitudin, elit ut mattis bibendum, leo nibh dignissim orci, ut posuere leo risus a magna. Maecenas vitae consectetur tellus. Duis porta, eros eu vehicula dignissim, libero tellus adipiscing felis, a convallis arcu eros vel turpis. Donec sit amet posuere massa. Integer non augue ligula. Aliquam a erat eu ipsum cursus vulputate. Curabitur rutrum lacus at felis mollis quis mattis justo mattis. Vestibulum tempor elementum sapien, vel porttitor tellus congue sed.
In a mi massa, at ultricies magna. Cras eget purus vitae justo blandit placerat. Vivamus euismod adipiscing tortor, vitae feugiat purus varius quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam auctor, nibh eget dictum ultricies, leo felis aliquam urna, quis vulputate tellus ligula non neque. Aliquam in nibh massa, convallis gravida velit. Aenean facilisis semper elementum.
Phasellus non dolor non tellus suscipit mollis vitae nec mi. Integer ac erat eu nunc elementum fermentum. Suspendisse commodo consectetur augue, id lacinia ligula ullamcorper ac. Aliquam vitae varius quam. Ut egestas mi sed ligula egestas vel fringilla elit ornare. Mauris vel erat turpis. Pellentesque massa nibh, euismod eget vestibulum in, semper vitae justo. Etiam leo leo, ornare quis tristique id, varius elementum nisi. Pellentesque cursus diam nec metus lacinia rhoncus. Ut sit amet augue vel mi volutpat molestie sed et orci. In felis dolor, sodales vel aliquam et, lacinia a magna.
Suspendisse blandit blandit lacinia. Donec eu dolor et arcu consectetur consequat. Mauris ornare, ante at tempor elementum, risus erat lobortis lectus, eu gravida ante est vel sem. Phasellus nulla massa, scelerisque et rutrum vitae, accumsan quis mi. Donec rutrum nunc ullamcorper lacus congue ut feugiat diam cursus. Suspendisse non consectetur mi. Sed et libero nisi. Phasellus nec urna quis metus iaculis volutpat vitae ac elit.
Sed luctus libero in augue varius auctor. In consequat lobortis eros vel semper. Sed et magna metus. Donec vitae erat non eros vestibulum iaculis a ac mi. Vivamus dictum lacinia ultricies. Donec felis lectus, vehicula ac vulputate eget, ullamcorper quis neque. Sed volutpat, nibh ut iaculis congue, mi sem convallis tellus, sit amet sagittis neque dolor sit amet orci. Phasellus non ligula convallis nulla varius tincidunt quis ac tortor. Nulla eu diam vel lectus sagittis venenatis in a augue. Nam lobortis consequat pharetra. Pellentesque a urna libero. Ut sit amet leo at ante dictum semper vel vel felis. Vivamus condimentum turpis id diam tempor fermentum.
Phasellus rutrum iaculis ipsum, vitae vestibulum nunc vulputate in. Maecenas vestibulum justo quis neque vehicula hendrerit. Integer ultricies lacus vitae massa cursus sit amet rutrum augue aliquet. Sed vel interdum quam. Vestibulum vestibulum ullamcorper elit ac facilisis. Nunc viverra sem eget dui tristique dignissim. Donec at risus ac elit molestie malesuada et nec ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris tempus pulvinar velit, vel ultricies dui bibendum nec. Mauris ac fermentum nunc. Aliquam eu lorem vitae diam placerat ultrices. Vestibulum gravida lectus congue nulla vulputate egestas. Mauris in interdum dolor.
Curabitur quis eros id velit venenatis porttitor et eu velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In velit libero, porttitor a blandit vel, ullamcorper eu quam. Quisque leo eros, mattis vitae blandit et, vulputate id elit. Nunc non ipsum non metus dapibus posuere. Maecenas id mollis metus. Etiam viverra, libero in fringilla pellentesque, tellus neque tincidunt tortor, eu scelerisque tellus metus sed est. Vestibulum neque diam, cursus interdum pharetra nec, condimentum eget arcu. Maecenas ac sapien magna, imperdiet tincidunt metus. Curabitur id nunc sed eros congue mattis. Phasellus ac lectus velit. Curabitur euismod elementum enim, nec eleifend dui tincidunt ut. Aenean lorem tellus, ultrices quis imperdiet sed, tempus id elit. Curabitur lacus tellus, posuere sed consectetur at, viverra in sapien. Pellentesque facilisis pharetra consectetur.
Suspendisse tellus sapien, faucibus nec tempor in, faucibus vel magna. Duis ullamcorper vehicula eros ac dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ante erat, molestie vitae vehicula nec, fermentum ut elit. Morbi tempor urna elit, a porta nulla. Nulla in augue sit amet nibh pellentesque sagittis. Etiam vestibulum dui aliquam mi mattis vel molestie mauris viverra. Sed nulla metus, feugiat vitae tempus eget, auctor a lorem. Donec pretium ultrices purus vitae pulvinar. Suspendisse potenti. Vivamus quam velit, varius ut mattis et, dapibus id tortor. In hac habitasse platea dictumst. Pellentesque sit amet diam quis tortor auctor tincidunt et sed ipsum. Mauris non auctor ligula. Aliquam ullamcorper dignissim pretium. Morbi id ornare mauris.
Nunc neque sapien, blandit sit amet malesuada vitae, congue quis lectus. Donec fringilla vestibulum dignissim. Proin varius, lectus at molestie adipiscing, odio erat accumsan ante, non ultricies diam diam in orci. Mauris massa mauris, mattis et dictum nec, dictum vitae tellus. Vivamus lacus ligula, semper a dapibus et, luctus quis lacus. Phasellus euismod pulvinar ligula quis vehicula. Aliquam suscipit, quam vitae dictum suscipit, orci mauris iaculis enim, et fringilla arcu erat vel massa. Suspendisse potenti. Sed quis urna nec lacus faucibus consequat. Praesent id lacus non purus gravida posuere sit amet et libero. Quisque volutpat, odio sed ornare rutrum, sapien neque scelerisque tellus, sed malesuada nisi nulla id risus. Duis at nibh a ligula porttitor sodales. Nunc ipsum nisl, iaculis non malesuada lobortis, tempor nec est. Phasellus ut justo mi, quis blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent non mauris id nunc ullamcorper viverra tempor nec eros.
Nulla rhoncus faucibus massa, nec ultricies neque elementum vel. Ut at eros justo, facilisis sodales nisl. Maecenas rutrum congue urna sit amet semper. Pellentesque consequat, risus non venenatis dictum, erat augue volutpat lectus, non imperdiet ipsum felis ut velit. Maecenas ac velit justo. In facilisis ligula et ante pretium ornare. Aenean lobortis sem ac urna commodo in aliquet nulla semper. Phasellus in est id velit rutrum ullamcorper. Nam tincidunt rhoncus porttitor. Suspendisse vestibulum consectetur arcu, in ullamcorper ante sollicitudin vitae.
Sed tempus elementum augue, in gravida erat bibendum eu. Integer justo tortor, pharetra non lacinia ut, accumsan vitae arcu. Praesent interdum, ante varius ultricies rhoncus, est eros ultricies magna, vitae tristique diam enim sit amet ipsum. Morbi egestas lacus eget orci rutrum lobortis. Vestibulum auctor justo eu neque lobortis et vehicula ipsum aliquet. Suspendisse potenti. Curabitur ut elit dolor. Duis quis risus ipsum. Ut gravida, felis eget aliquam faucibus, leo enim cursus quam, id sollicitudin libero mi vel libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut viverra venenatis nisi, ac placerat nunc elementum id. In rhoncus rhoncus sollicitudin. Ut eget felis enim. Donec viverra, ligula ac gravida pulvinar, turpis ante suscipit tortor, vitae accumsan ligula augue ac nisi.
Integer in ipsum ante, quis varius augue. Nam scelerisque lobortis quam id mattis. Quisque suscipit risus eu neque pellentesque tempor et eget nisi. Aliquam vel leo sed lorem auctor semper sit amet non sapien. Sed enim elit, varius eu auctor tincidunt, tincidunt et nisl. In hac habitasse platea dictumst. Suspendisse enim est, posuere eu commodo nec, dapibus convallis arcu. Mauris laoreet aliquam nibh, a consequat urna mollis ut. Fusce congue sodales velit id bibendum. Aliquam erat volutpat. Integer at suscipit diam. Sed porta faucibus aliquet. Nullam sit amet arcu vel tellus dignissim scelerisque non sit amet mi.
Etiam vulputate mauris pulvinar tellus vulputate luctus. Cras sit amet mollis felis. Suspendisse potenti. Mauris tincidunt elementum blandit. Vivamus lobortis ante eget est rhoncus accumsan. Pellentesque pulvinar, nulla eget hendrerit placerat, augue est porttitor quam, id condimentum massa diam nec felis. Curabitur iaculis erat non tortor mollis venenatis. Aliquam eget lacus tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae arcu id risus pulvinar viverra eu vitae augue. Aliquam convallis ultrices purus ac pulvinar.
Donec vel mauris non lorem tristique feugiat ut sit amet erat. Cras vitae scelerisque justo. Donec rhoncus imperdiet euismod. Praesent id augue vel velit sollicitudin auctor. Etiam a arcu justo. Nulla ac erat id erat vehicula tincidunt. Vivamus accumsan erat rhoncus metus posuere quis sollicitudin mi tristique. Vestibulum id dolor eu dui ornare eleifend.
Phasellus at mi urna, quis pretium dui. Praesent gravida lacus quis dui aliquam sagittis. Ut ullamcorper vehicula nibh. Cras pretium massa eget eros hendrerit et bibendum tortor consectetur. Fusce euismod interdum sem, et placerat dolor posuere at. Nullam rhoncus ornare nibh, vel fringilla urna tristique ac. Nullam gravida enim a ipsum sodales placerat. Morbi leo nunc, tempus at pellentesque ac, sodales sit amet purus.
Aenean tempus rhoncus neque gravida venenatis. Integer dignissim malesuada dolor ac fringilla. Nunc pretium mi at nibh mattis pulvinar. Morbi sit amet ipsum lorem. Suspendisse potenti. Vestibulum nec commodo dui. Vestibulum hendrerit auctor condimentum. Fusce bibendum, risus et rutrum pharetra, eros tellus fringilla turpis, eget ultrices ligula nibh sit amet ipsum. Phasellus imperdiet, augue eu euismod cursus, sem dui egestas orci, vitae ullamcorper magna sapien vel sapien. Ut euismod accumsan quam, vel interdum dui condimentum eu. Donec sed eros eu erat ultricies rhoncus sit amet id eros. Pellentesque nec nibh orci, sit amet euismod nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dolor lectus, pellentesque at hendrerit vel, cursus quis ante.
Integer in augue leo. Quisque a libero urna, eu accumsan augue. Aliquam hendrerit, justo nec tincidunt tempus, tellus lorem consequat tellus, ut tristique massa diam at mi. Phasellus velit urna, viverra eu blandit non, euismod id odio. Aliquam lobortis lectus id est suscipit ac luctus erat lacinia. Donec convallis, felis at gravida imperdiet, risus odio interdum sapien, sit amet mattis dui sapien id massa. Ut tellus purus, rhoncus eu hendrerit id, gravida eget libero. Sed et pellentesque nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ipsum felis, scelerisque vel porta eu, aliquam eu sem. Pellentesque tincidunt, odio id rhoncus accumsan, ipsum turpis rutrum purus, vel pellentesque lectus justo nec massa. Nullam vestibulum egestas pulvinar. Nam libero augue, bibendum eu feugiat vel, dictum eget orci. Cras quis lorem in augue adipiscing blandit. Cras iaculis placerat lectus sed consectetur. Aliquam tempus, purus eu auctor scelerisque, lorem mi vehicula elit, id semper quam leo in mauris.
Praesent dolor tortor, lacinia venenatis cursus sit amet, ultrices et dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent vehicula eros eget libero faucibus elementum at vitae ante. In porta ullamcorper urna sit amet interdum. Nullam dolor tellus, iaculis ac faucibus in, tristique id ante. Etiam ornare, elit ac posuere venenatis, mi libero volutpat velit, non egestas magna ligula id nulla. Morbi nisl ipsum, semper a pulvinar in, elementum in velit. Sed sagittis enim nec leo dictum et hendrerit mi laoreet. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris in leo leo, at vehicula nibh. Donec pharetra fringilla massa nec blandit. Donec justo lectus, elementum et commodo eu, viverra in dolor.";

$paragraphs = explode("\n", $text);
$chars = false;
$paras = false;

// GET Params
$pstart = 0;
if (isset($_GET["pstart"])) {
    $pstart = $_GET["pstart"];
    $paras = true;
}
$plength = sizeof($paragraphs);
if (isset($_GET["plength"])) {
    $plength = $_GET["plength"];
    $paras = true;
}
$delay = 0;
if (isset($_GET["delay"])) {
    $delay = $_GET["delay"];
    $paras = true;
}
$format = "text"; // plain text
if (isset($_GET["format"])) {
    $format = $_GET["format"];
}

// POST Params (priority)
$cstart = 0;
if (isset($_POST["cstart"])) {
    $cstart = $_POST["cstart"];
    $chars = true;
}
$clength = strlen($text);
if (isset($_POST["clength"])) {
    $clength = $_POST["clength"];
    $chars = true;
}
if (isset($_POST["delay"])) {
    $delay = $_POST["delay"];
    $chars = true;
}

if ($chars) {
    echo substr($text, $cstart, $clength);
    sleep($delay);
} elseif ($paras) {
    if ($format == "xml") {
        header('Content-type: text/xml');
        echo "<LoremIpsum>\n";
        echo '   <params pstart="' . $pstart . '" plength="' . $plength . '"' . "/>\n";
    }
    for ($i = $pstart; $i < sizeof($paragraphs) AND $i < $pstart + $plength; $i++) {
        if ($format == "xml") {
            echo '   <paragraph pnum="' . $i . '"' . ">\n";
            $sentences = explode(".", $paragraphs[$i]);
            for ($j = 0; $j < sizeof($sentences); $j++) {
                $output = trim($sentences[$j]);
                if ($output != "")
                    echo '      <sentence pnum="' . $i . '" snum="' . $j . '">' . $output . '.</sentence>' . "\n";
            }
            echo "   </paragraph>\n";
        }
        else
            echo $paragraphs[$i] . "\n";
    }
    if ($format == "xml")
        echo "</LoremIpsum>\n";
    sleep($delay);
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Lorem Ipsum Server API</title>
            <style type="text/css">
                td {
                    vertical-align:top;
                }
            </style>
        </head>
        <body>
            <h1>Lorem Ipsum Server API</h1>
            <p>A test bed for AJAX queries. </p>
            <p>Created June 2012 by Sam Scott for
                SYST 35288 (Mobile Web-Based Application Development) at Sheridan College (Ontario).</p>
            <h2>GET Parameters</h2>
            <table>
                <tr>
                    <td><b>pstart:</b></td>
                    <td>index of first paragraph to fetch (defaults to 0)</td>
                </tr>
                <tr>
                    <td><b>plength:</b></td>
                    <td>number of paragraphs to fetch (defaults to max value)</td>
                </tr>
                <tr>
                    <td><b>format <span style="color:red">(new)</span>:</b></td>
                    <td>if set to value 'xml' will produce xml formatted output</td>
                </tr>
                <tr>
                    <td><b>delay:</b></td>
                    <td>number of seconds to delay request (defaults to 0)</td>
                </tr>
            </table>

            <h2>POST Parameters</h2>
            <table>
                <tr>
                    <td><b>cstart:</b></td>
                    <td>index of first character to fetch (defaults to 0)</td>
                </tr>
                <tr>
                    <td><b>clength:</b></td>
                    <td>number of characters to fetch (defaults to max value)</td>
                </tr>
                <tr>
                    <td><b>delay:</b></td>
                    <td>number of seconds to delay request (defaults to 0)</td>
                </tr>
            </table>
            <h2>Other Information</h2>
            <p>All parameters are optional.</p>
            <p>If POST data is present, GET data is ignored.</p>
            <p>Loading with no parameters displays this instruction page.</p>
            <p>To test the interface with POST data: <a href="loremIpsumPostTest.html">loremIpsumPostTest.html</a></p>
        </body>
    </html>

    <?php
}
?>
