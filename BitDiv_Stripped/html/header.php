<style>
  h1{
    font-size: 20px;
    color: #111;
  }
  .content{
    width: 80%;
    margin: 0 auto;
    margin-top: 50px;
  }

  .typeahead-devs, .tt-hint {
    border: 0px solid #000000;
    border-radius: 8px 8px 8px 8px;
    font-size: 24px;
    height: 35px;
    line-height: 30px;
    outline: medium none;
    padding: 8px 12px;
    width: 400px;
  }

  .tt-dropdown-menu {
    width: 400px;
    margin-top: 5px;
    padding: 8px 12px;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px 8px 8px 8px;
    font-size: 18px;
    color: #111;
    background-color: #F1F1F1;
  }

</style>
<script>
  $(document).ready(function() {
    $('input.typeahead-devs').typeahead({
      name: 'stocks',
      local: ["ACT","ADM","AEE","ADP","ADS","ADT","AES","AGN","AVY","AIG","AIV","AIZ","ALL","ALLE","ALTR","ALXN","AMAT","AME","AMP","AMT","AMZN","BCR","APA","APC","APD","MCHP","APH","AVB","AVP","AXP","AZO","BAX","BBBY","BBY","BDX","BEAM","BHI","BIIB","BLL","BMS","BMY","BRK_B","BSX","BXP","CAG","CAH","CAM","CCI","CF","CFN","MCK","CHRW","CI","CL","CLX","CMA","CME","CMG","CMI","CMS","COF","COG","COH","COP","COST","CPB","CRM","CSC","CSCO","CSX","CTAS","CTL","CTSH","CVC","D","DAL","DE","DFS","DG","DGX","DIS","DISCA","DLPH","DLTR","DNB","DNR","DOV","DOW","DRI","DTE","DTV","DUK","DVA","EBAY","ECL","ED","EFX","EIX","EMC","EMN","HAS","EMR","EOG","EQT","ESRX","FDO","ESV","MET","ETN","ETR","EW","NOC","EXPD","FB","FDX","FE","FIS","FISV","FLIR","FLR","FMC","FRX","FTI","FTR","GAS","GCI","GE","GHC","GILD","GPS","GRMN","GS","GWW","HAL","HAR","HBAN","HCBK","HCN","HD","HES","HOG","HON","HOT","HP","HRB","HRL","HRS","HSP","HST","HSY","HUM","IBM","ICE","INTU","IGT","INTC","ISRG","ITW","JBL","JEC","JNPR","OMC","KIM","KLAC","KMB","KMI","KO","KR","KRFT","LEN","KSS","KSU","L","LLL","LM","LMT","MTB","LNC","LO","MKC","PAYX","PBCT","PCAR","PCG","PG","PPL","RDC","RL","SNI","STZ","SWY","SYK","SYY","TJX","TRIP","TROW","UNH","UNM","VNO","MMC","VTR","WYN","XYL","ZION","ZMH","MON","LRCX","LUK","LUV","LYB","MA","MPC","NDAQ","MS","A","NEM","ABBV","ABC","ABT","MAT","MJN","MNST","MOS","MRK","MRO","MSFT","MSI","MUR","NEE","NE","NFX","NSC","NTAP","NTRS","NU","NUE","NWL","NWSA","OI","ORLY","OXY","PBI","PCLN","PCP","PDCO","PEG","PETM","PFE","PGR","PH","PHM","PKI","PLD","PLL","PNC","PNR","PNW","PPG","PRGO","PRU","PSX","PVH","PX","QEP","R","REGN","RF","RHI","RHT","ROK","ROST","RTN","SBUX","SCG","SCHW","SE","SEE","SIAL","SLB","SLM","SNA","SO","SPG","SRE","STI","STX","TSN","SWK","SWN","SYMC","TAP","TE","TEG","WU","TEL","TGT","TMK","TSS","TWX","TXN","TYC","UPS","URBN","USB","UTX","V","VFC","VIAB","VLO","VMC","VRSN","VRTX","VZ","WAG","WAT","WDC","WEC","WFC","WHR","WIN","WLP","WMB","WMT","X","XEL","XLNX","XOM","XRAY","XRX","YHOO","YUM","ZTS","MAC","MAR","IPAR","IPGP","INTL","NSIT","INSM","NSP","IIIN","PODD","INSY","KOS","IBKR","ININ","IDCC","INVN","TILE","IMI","ITMN","KRA","INAP","ISCA","KTOS","IRDM","JAKK","ISIL","IILG","IBCA","ISH","IL","SNAK","KOP","KFY","ITG","ISBC","ITIC","IO","IIVI","HFC","HNI","HOLX","HBCP","HOMB","HOME","HLSS","AWAY","HMST","HTBI","HOFT","HMN","HBNC","HZNP","HRZN","HOS","HWCC","HOV","HHC","HSNI","HUBG","HVB","JBHT","ICUI","HII","HURC","HURN","HTCH","H","HPTX","HY","IBKC","ICFI","ICGE","ICON","IDA","IDIX","IEX","IMN","IDXX","IDT","IGTE","IRG","ILMN","IMMU","IMMR","IMGN","IPXL","IFT","IMPV","SAAS","INCY","IHC","IBTX","INFN","INFI","IMKTA","IPCC","BLOX","INFA","VOYA","IM","INGR","IPHS","IOSP","ISSC","IPHI","IART","IDTI","I","MACK","MLAB","CASH","MEI","METR","MTD","MGEE","MTG","MCRL","MSCC","MSTR","MBRG","MIDD","MSEX","MSL","MPO","MDW","MOFG","MM","MILL","MDXG","MSA","MTX","MG","MIND","MITK","MKSI","MINI","MOD","MLNK","MCP","MNTA","MCRI","MGI","MPWR","TYPE","MNRO","MWW","MHGC","MOSY","NPK","MOV","MOVE","MRC","MSM","NATH","MSCI","MTSC","MLI","MWA","LABL","MFLX","MGAM","MVC","MWIV","MYRG","MYGN","NC","NANO","NSPH","NASB","NBHC","NKSH","FIZZ","NCMI","NFG","NHC","NATI","PRTA","NATL","NPBC","NWLI","NSM","NGS","NGVC","BABY","PRSC","NATR","NLS","NAVB","NCI","NAVG","PFS","NAV","NCS","NCR","NP","NKTR","NNI","NEOG","NEO","NEON","NPTN","NETE","NTCT","NBIX","NSR","IQNT","NJR","NMFC","NWY","NYCB","NYT","NBBC","NLNK","NEU","NR","NEWP","NEWS","NXST","NVAX","NGPC","EGOV","NICK","NIHD","NL","NFBK","NNBR","NOR","NAT","NDSN","NTK","NOG","NWBI","NWN","NWPX","NCLH","NPSP","NTLS","NUS","NUAN","PROV","NMRX","NUTR","NTRI","NUVA","OIS","NES","NVEC","NVR","NXTM","OAS","OII","OCFC","OCN","OMEX","ODP","OFG","OGE","ODC","ODFL","ONB","ORI","OLN","ZEUS","OMG","OFLX","OME","OMER","OABC","ORB","OCR","OMCL","OVTI","OMN","ASGN","ONNN","OGXI","OB","OPEN","OPK","OPLK","OPY","OSUR","ORBC","OWW","TIS","OREX","OEH","ORN","OSK","OSIS","OSIR","OTTR","OVAS","OSTK","OMI","OC","PCCC","PACB","PCBK","PPBI","PCRX","PKG","PACW","PLMT","P","PNRA","PHX","PTRY","PZZA","PZG","PRXL","PRK","PKOH","PSTB","PKD","PRKR","PRE","PATK","QLGC","KWR","PATR","PTEN","PDFS","PDLI","PGC","PEGA","PCO","PENX","PENN","PVA","PFLT","PNNT","JCP","PFSI","PAG","PBY","PPHM","PSMI","PRFT","PFMT","PSEM","PTX","PETS","PHH","PQ","PGTI","PMC","PHIIK","PNX","PHMD","PICO","PNY","PNFP","PIKE","PPC","PF","PES","PJC","PLT","PTP","PCYO","PGEM","PZN","PMCS","PII","PMFG","QADA","POR","PLCM","POOL","BPOP","PRAA","PTLA","POST","POWL","POWI","PSIX","POWR","POZN","QGEN","PFBC","PLPC","PGI","PBH","QLIK","PRGX","PSMT","PRI","PRA","PKT","PGNX","PRGS","PFPT","QUAD","KKD","KRO","PSEC","LLEN","LZB","LTS","LG","LBAI","LBY","LKFN","LAMR","LANC","LNDC","LSTR","CALL","LCI","LPI","LVS","LSCC","LAYN","LCNB","LF","LEA","LII","LVLT","LXRX","LXK","LBTYA","LINTA","LMCA","LVNTA","LOCK","LCUT","LFVN","LWAY","LGND","LMNR","QSII","LINC","LECO","LNKD","LIOX","LGF","LQDT","LAD","LFUS","LYV","LPSN","LKQ","LMIA","LOGM","LORL","LPX","LPLA","LXU","LYTS","LTXC","LUB","LL","LMNX","LMOS","LDL","MHO","MTSI","MCBC","MSG","MGLN","MHR","MHLD","MAIN","MSFG","MANH","MNTX","MBI","MNKD","MANT","MSO","MCS","MRIN","MPX","HZO","MKL","MKTX","MKTO","MRLN","MRVL","VAC","MRTN","MLM","MASI","MTRN","ZQK","MTRX","MATX","MDSO","MATW","MFRM","MXIM","MMS","MXL","MBFI","MNI","MGRC","MDCA","MDC","MDU","MIG","MEAS","MEG","MDCI","MDCO","MED","MW","MDVN","MCC","MD","MEIP","MENT","MBWM","MBVT","MCY","MRCY","RP","MDP","MRGE","VIVO","MMSI","MTH","MTOR","MODN","QTM","STR","QCOR","KWK","QDEL","QNST","Q","RAX","RDN","SCI","RSH","RSYS","RMBS","SSNI","SCTY","RJF","SFNC","ROLL","RLOC","RLD","SSD","RNWK","RLGY","RCPT","NOW","RRGB","RGC","RM","SBGI","SONS","BID","RGS","RGLS","RGA","REIS","RS","RNR","RNST","REGI","SJI","SREV","SSTK","RCII","RTK","SCCO","SKH","RENT","SKUL","SKYW","RGEN","SWKS","RPRX","RJET","RBCAA","SWHC","RMD","SBSI","REN","RFP","SWX","REXI","CODE","RECN","LOV","SPAR","SPTN","SPA","SPNC","SPB","SWI","RVLT","SZYM","SLH","SAH","REX","REXX","RXN","RFMD","RMTI","OKSB","RELL","RIGL","RNET","RCKB","RAD","RVBD","RLI","SONC","RRTS","RKT","ROC","SPLK","ROG","ROL","ROSE","RST","RES","RNDY","AOS","ROVI","RPM","LNCE","RPXC","RTIX","SIRI","SIRO","S","SIX","SJW","RTI","RBCN","RTEC","RT","RKUS","STRZA","RUSHA","SKX","SLRC","SUNS","RYL","STBA","SAFT","SGNT","SAIA","SHOR","SALM","JBSS","SLXP","SBH","SN","SAFM","SD","SASR","BSRR","SHLO","SIGA","SGMO","SRPT","SBAC","SCSC","SCBT","HSIC","SCHN","SCHL","SHLM","SIGM","SWM","SCLN","SGMS","SQI","STNG","SSP","SEB","SEAC","SFLY","SBCF","CKH","SDRL","SHLD","SHOS","SGEN","SEAS","SEIC","SCSS","SEM","SCVL","SIGI","SEMG","SMTC","SIG","SENEA","SXT","SQNM","SLGN","QLTY","NX","SGI","SSYS","SPF","TMHC","TCB","SXI","STSI","STRA","STFC","STBZ","SYRG","SNX","SNPS","TSLA","SNV","TSRA","TTEK","TTI","TTPH","TCBI","WEN","TXMD","THRX","SMRT","RGR","SCM","STML","THR","TCRD","STE","TTGT","STRL","STSA","STC","SNBC","SXC","SUNE","SNSS","SPWR","SMCI","SF","SUP","SPRT","SWC","SUSQ","SUSS","SIVB","SFY","SPPI","SWFT","TECUA","SWSH","TNK","TRC","TRK","TNAV","SPR","TDS","SAVE","TTEC","TPX","TNC","TEN","SYNT","SYUT","SPSC","SWS","TER","SPW","SSNC","TEX","DATA","TAHO","SYKE","TMH","TISI","JOE","SYA","TECD","TECH","TBNK","STAA","TSRO","STMP","TTWO","TAM","TNGO","SFG","SMA","GEVA","SNCR","SGYP","TASR","TRGT","SMP","TAYC","TTC","TOWR","TZOO","TREE","TPH","SUPN","TXI","TFSL","HSH","THLD","SNTA","TESO","TCPC","AMTD","TK","TWI","TUES","TIVO","TMUS","UIS","UNT","TUMI","TMP","TR","TRNX","TWGP","USM","TWER","CLUB","ULTA","TOWN","TWMC","TG","ULTI","UCTT","UPL","THS","TCAP","TPLM","TWIN","UMPQ","TCBK","TRS","TRMB","TRN","GTS","TUP","TQNT","TSC","TGI","TBI","TRLA","TYL","TRST","USCR","TRMK","TRW","TTMI","USG","UNF","TPC","THO","THOR","TIBX","TDW","TTS","TLYS","URI","TWTC","USAP","USMO","UTI","UACL","UTMD","USPH","SLCA","UBNT","UTIW","USLM","UVSP","UFPT","UTHR","VR","UIL","VTG","ULTR","UTEK","UMBF","UA","UNXL","UFI","UNS","VDSI","VASC","USNA","USMD","UNIS","UBSH","URG","USTR","UTL","UAM","AAPL","UVV","OLED","UEIC","UBSI","UCFC","UFPI","UCBI","UAL","UBNK","UHS","UFCS","UNFI","URS","UVE","UNTD","ECOL","WNC","VICL","WBC","WAB","VICR","VLGEA","VRNT","UEC","VPG","VPRT","VECO","VRSK","WRES","WDR","WSO","VC","VHC","WAGE","VRTS","VSTM","PAY","VMW","MTN","VCRA","VLY","VMI","VOCS","VAL","VOXX","VVTV","VRNG","VSEC","VIAS","WTI","VGR","VVUS","VOLC","VG","WBS","WTW","WCG","WERN","WCC","WTBA","WSTC","WD","WMAR","WSM","WLB","WLT","WAC","WABC","WBCO","WTS","WAFD","WAL","WNR","WASH","WFD","WCN","WPP","VPFG","WDFC","WSBF","WLK","WWWW","WBMD","VITC","VSI","WIBC","WINA","WR","WGO","WSTL","WTFC","WETF","XNPT","XRM","XOOM","WHG","WTSL","WEX","WEYS","XPO","YELP","YORW","YRCW","WGL","WWW","INT","ZLC","WWAV","WTM","WHF","ZBRA","ZLTQ","WLL","ZEP","Z","ZIOP","WDAY","WG","WAIR","WOR","ZUMZ","WLH","WST","CWEI","WMGI","WRLD","WSFS","XOMA","YDKN","ZAZA","ZIXI","ZGNX","CSE","CLF","LIFE","OFIX","PACR","PTGI","SANM","SUPX","TAL","SYX","TDY","TGH","TESS","TREX","TRI","JNY","TITN","TW","TOL","TDG","TRR","WOOF","VVC","WSBC","ZNGA","SCMP","SRI","BEN","DVN","JOY","CHK","CVS","CMCSA","SNDK","COL","BHE","BGCP","WRB","BHLB","BIG","BCEI","BH","BDSI","BMRN","BIOL","BIO","BRLI","BIOS","BJRI","BBOX","BTX","BAH","BKH","HAWK","BLMN","BLKB","BKCC","BLT","NILE","BCOR","BXC","BTH","BNCN","BODY","BOBE","BOFI","WIFI","HNH","BOLT","BONT","BOKF","SAM","BPFH","EPAY","BDBD","BYD","BPZ","BBRG","BPI","BRC","BBNK","BDGE","BGG","BCOV","EAT","BCO","CARB","BRS","BR","BRKS","BRCD","BSFT","BKD","BRKL","BRKR","BRO","BC","BKE","BWLD","BLDR","CFFI","BKW","BG","CAB","CCMP","CBT","CACI","CDNS","HERO","CZR","CAP","DVR","CALM","CLMS","CVGW","CAMP","CCC","CFNB","CWT","CALX","ELY","CPN","CALD","CBM","CAC","CMN","CSU","CPLA","CFFN","CCBG","CSWC","CPST","CRR","CFNL","CSII","CATM","CSL","CKEC","CRS","TAST","CRZO","CRI","CASY","CACB","CWST","CAS","CSH","CTRX","CASS","CATY","CATO","CVCO","CDI","CBEY","CBZ","CBOE","CECE","CGI","CE","CTIC","CNC","CSFL","CNBC","CETV","CENTA","CPF","CENX","CNBKA","CVO","CPHD","CERS","CRL","ECOM","CEVA","GTLS","CHE","CHFN","CHTR","CCF","CKP","CHEF","CAKE","CHTP","CHFC","CCXI","CHMT","CHMG","LNG","CPK","CBI","PLCE","CMRX","CHH","CHDX","CQB","CBK","CHD","CHDN","CHUY","CIEN","CRUS","CBR","CIFC","CBB","XEC","CIT","CTRN","CZNC","CIA","CLC","COKE","CHCO","CYN","CLH","CCOI","CLNE","CCO","CLW","CSBK","CLVS","CLD","CCNE","CTS","CNA","CNO","CIE","COBZ","CDE","CNS","COHR","CFX","COHU","CMCO","COLB","FIX","CMC","CVGI","CBU","CBSH","CVLT","CMP","CTBI","CPSI","CPRT","CNSI","SCOR","CTO","CXO","CVA","CONN","CMTL","CNSL","CTWS","CPSS","CTCT","MCF","CLR","CVG","CNW","COO","CPA","CORT","CORE","CLGX","COCO","CSOD","CNDO","CEB","JKHY","CSGP","CRAY","CRRC","CRAI","BREW","CACC","CBRL","CCRN","CCK","CRWN","CSGS","CMLS","CUNB","CUB","CRIS","CBST","CFI","CUBI","CW","CVBF","CYNO","CVI","CUTR","CYTX","DJCO","CY","CYTK","CYT","DAN","DAR","DF","TRAK","DWSN","DECK","DFRG","DGAS","DEL","DLX","DMD","DWRE","DNDN","DENN","DEST","DSCI","DXLG","DXM","DXCM","DMND","DLLR","DHIL","FANG","DHX","DKS","DDS","DBD","DMRC","DRIV","DGI","DCOM","DIOD","BAGR","DPZ","DLB","DCI","UFS","RRD","DGICA","DRL","DORM","PLOW","DRC","DW","DSPG","DRQ","DST","DNKN","DCO","DTSI","DYAX","DVAX","DYN","ESC","BOOM","EXP","EGBN","ELNK","EV","EBIX","EDMC","EGAN","EHTH","BAGL","EE","ELRC","ESIO","EFII","ELLI","EMCI","EME","EOX","EBS","EDE","ENTA","END","ECPG","ENDP","WIRE","ENH","ELGX","ENOC","EXXI","EGN","ENPH","EGL","NPO","ENSG","ESGR","EBTC","ENTG","ETM","EVC","EFSC","ENV","ENTR","EPAM","EPZM","EPIQ","EPL","PLUS","EQU","ERA","EQIX","ERIE","EAC","ESBF","EXEL","ESSA","ESE","ETH","EVR","EVER","EEFT","EVRY","EVTC","RE","EPM","EXAR","EXAC","EXAM","EXLS","XCO","XLS","XONE","FWM","EXPR","EXPO","EXH","FN","EZPW","LION","FDS","FICO","FCS","FFKT","FRP","FARO","FARM","FFG","FBRC","FDML","AGM","FII","FEIC","FSS","FOE","FCSC","FNF","FDUS","FHN","FSC","FRGI","FNGN","FISI","FAF","FBNC","FINL","FNLC","FBP","FCNCA","FCF","FBNK","FCBC","FDEF","FFBH","THFF","FFNW","FIBK","FRME","FLIC","FMD","FMBI","NBCB","FNFG","FRC","HCCI","BANC","FSGI","SVVC","FLT","FMER","FIVE","FLTX","FLO","FLDM","FNB","FL","FST","FOR","FORR","FORM","FWRD","FBHS","FET","FXCB","FSTR","FRAN","FELE","FC","FRNK","FSL","FDP","RAIL","TFM","FRO","FCN","FSYS","FCEL","FUL","GARS","FURX","FF","FXCM","GCAP","GALE","GK","GBL","AJG","ROCK","GLOG","GST","IT","GMT","GNRC","GY","GMO","GNMK","GCO","GWR","GHDX","GBLI","G","HASI","GNTX","THRM","GTIV","GABC","GFIG","GIII","GLAD","GAIN","HDNG","GXP","BRSS","ENT","GCA","GLT","HLIT","GLPW","GMED","HHS","HE","GSM","GNC","GLNG","GORO","GBDC","GMAN","GDP","GDOT","GRC","GPX","GRA","GTI","LOPE","GVA","GSBC","GB","GTN","GLDD","GPK","HA","HAYN","HWKN","HCI","HCC","HIIQ","HWAY","HL","HEI","GTAT","GBNK","GUID","HCKT","HK","GLRE","GHL","FLWS","FUBC","SRCE","EGHT","AVHI","ACCO","DDD","AHC","AAON","AIR","ANF","AAN","ABAX","ABM","ABMD","AXAS","ACTG","ACHC","ANCX","ACAD","ARAY","ACCL","AXDX","ACRX","ACIW","ACW","ACET","ACOR","BIRT","ACFN","ATU","AEGR","AE","ADTN","AYI","ATVI","ACXM","ADES","ADUS","AMD","AAP","AEIS","AEGN","ADVS","ABCO","AFFX","AGYS","ARX","ARO","AEPI","AVAV","AGCO","AL","AMG","AYR","AKS","ATSG","AIRM","ALG","ALB","AKRX","AIN","ALK","ALGN","AMRI","ALKS","GRIF","ALR","ALEX","ALCO","ALIM","Y","ALGT","ALE","AFOP","AIQ","AOI","ATK","AOSL","LNT","ANV","AWH","ALSN","AFAM","MDRX","ALNY","ALJ","ANR","UHAL","ATEC","RESI","AIMC","AMBC","AMAG","AMBA","AMCX","ACO","AMED","DOX","APEI","AMRC","AXL","ASEI","APP","AEO","ARII","AFG","ACAS","AMNB","ANAT","ATLO","AMSWA","AWR","AWK","AVD","CRMT","AMWD","ABCB","FOLD","AP","AMSF","AMKR","AMPE","AHS","AMSG","AFSI","ANDE","ANAC","AMRS","ANGI","ANAD","ANIK","ANGO","AXE","ATRS","BNNY","ANSS","APOG","ANN","APAGF","AOL","ATNY","APOL","AMCC","ACI","ATR","AIT","AINV","AREX","WTR","ARSD","ARC","ACGL","ACAT","AGX","ARNA","ABFS","AI","ARCC","AWI","AGII","ARQL","ARIA","ARRS","AROW","ARRY","ARW","APAM","ASCMA","ARTC","ARTNA","ARUN","ABG","ASNA","ASBC","AHL","ASH","AGO","AZPN","ASTE","ATHN","ATRO","AF","AT","ATML","ATNI","AAWW","ATO","ATRC","ADNC","ATRI","AVEO","AVGO","AVNR","AVNW","CAR","AVG","AVID","ACLS","AVT","AXLL","AVX","BGS","AXS","AZZ","BWC","BCPC","BMI","BWINB","BYI","BANF","BLX","TBBK","BKYF","BXS","BKMU","BKU","BOH","BMRC","OZRK","BFIN","RATE","BKS","BANR","BHB","BDE","B","DFZ","BAS","BV","BBCN","BBX","BECN","BEAV","BBGI","BZH","BBG","BDC","BEBE","BNCL","BERY","BELFB","BGFV","GPRE","GBX","GSVC","GRPN","GPI","GFF","GSIT","GSIG","GTXI","GWRE","GES","GIFI","GLF","GPOR","HEES","HAE","HAIN","HBIO","HNRG","HALL","HMPR","HBI","HBHC","HGR","HAFC","THG","HRG","HSC","HVT","HCOM","HCA","HW","HCSG","HSTM","HTLD","HTLF","HTWR","HPY","HSII","HMTV","HELE","HLX","HLF","HTGC","HTBK","HFWA","HEOP","HXL","HTZ","MLHR","HF","HIBB","HI","HTH","HRC","HIFS","HMSY","BCC","BFAM","COWN","CRY","HITT","MRH","ISSI","IRF","NTGR","RPTP","PNK","PRO","OXM","PCTI","SHEN","TRGP","SCL","SPN","SVU","WPX","WMK","WWE","AMGN","GT","GNW","GM","MDLZ","PEP","XL","NBR","NFLX","RSG","RRC","NOV","NLSN","NVDA","PSA","PWR","ROP","UNP","SJM","TSCO","WY","ATI","CA","GNCMA","ETFC","DO","IFF","EL","FAST","GIS","GOOGL","FCX","GD","IP","BBSI","IPG","IRM","LH","KORS","MAS","MCD","MHK","MU","NI","CVD","FFIN","FBC","LHCG","EXPE","ARG","GGP","IR","LEG","LLTC","MYL","TIF","CST","DSW","DRTX","ENR","EXAS","GGG","STL","ZINC","INDB","MDR","MCGC","MTZ","MDAS","ALOG","AVA","ATMI","CJES","MLR","BWA","AEP","CPE","BLK","CELG","CSV","CECO","CLDX","N","CNK","CNL","CYH","CRVL","CRK","CR","CYBX","MORN","DV","DAKT","DK","ECHO","PERY","DIN","PCL","POM","STT","ENZN","FRM","FXEN","MOH","GLUU","FIO","PANW","PIR","PLXS","POL","PRLB","PRIM","RAVN","PBYI","PVTB","PB","RDI","RBC","REV","SAPE","SPNS","SBNY","SGY","SUBK","STLD","TGE","TXRH","TFX","UGI","UPIP","VNTV","VRTU","VSAT","VSH","ZAGG","DXPE","GOOG","ERII","ECYT","ENS","AEL","HCP","HIG","CBF","HPQ","BMTC","ACHN","PFG","ATW","ACN","BBT","ACM","PXD","CBG","CERN","QCOM","INWK","BWS","JCI","JNJ","JWN","TDC","TRV","K","AMSC","T","AA","CB","LOW","MHFI","ACE","ADI","ADBE","BF_B","ADSK","AET","BRCM","CCL","COV","DD","CCE","BA","AN","BAC","BK","CAT","LSI","CBS","NRG","CINF","CTXS","M","RAI","DPS","EA","CNX","MWV","LLY","THC","EQR","MCO","MDT","MMM","NKE","RIG","FLS","NBL","FOSL","FOXA","FSLR","TMO","VAR","WM","AUXL","PBF","GME","CEMP","CAVM","CHS","CIR","DTLK","CPWR","CROX","CGNX","CTB","CSS","DWA","DEPO","DY","SATS","RDEN","EBF","FNSR","BUSE","EXTR","FFBC","FHCO","FFIC","FVE","FCFS","FTK","FRF","GNE","GERN","BGC","GHM","GEOS","HNT","HALO","HGG","ONE","HITK","HUN","IACI","IPI","IHS","IBOC","IVC","LTM","IPCM","MTW","ICPT","KVHI","IRBT","LPNT","KYTH","LNN","LDR","LLNW","MAN","MN","SHOO","EBSB","MCHX","MTDR","MXWL","TAXI","MCRS","MGM","MYE","NRCIA","NBTB","NWE","NRIM","ORA","PSUN","PDCE","ORIT","PWOD","PKE","PEBO","PLPM","PLXT","PNM","PCYC","PLAB","PL","QLYS","PPO","RSTI","REMY","RALY","RH","RCL","RUTH","RGLD","SFE","SFL","SYBT","SGA","SGK","SMG","SLAB","SM","SIMG","STNR","SON","SSI","SCS","SRDX","TICC","SNHY","TGTX","SYNA","TEAR","TSYS","TKR","VRA","EGY","VNDA","VVI","XOXO","ZIGO","AKAM","C","DHI","EXC","FFIV","FITB","GLW","LB","MO","OKE","ORCL","TXT","AON","CVX","AFL","BTU","PM","WYNN","STJ","BSET","WWD","CIX","CNQR","CNMD","CNOB","CREE","CNP","DHR","F","DGII","GPC","IVZ","JPM","KEY","KMX","SHW","SRCL","SPLS","TWC","TSO","WFM","EOPN","EWBC","ELX","EIG","ESL","FLXS","FTNT","FRED","GBCI","GPN","GSOL","HLS","HTCO","INTX","COLM","CWCO","CFR","CYNI","DELL","DISH","FULT","GEF"]

    });
})
</script>
<!-- header -->
<header id="header" class="app-header navbar" role="menu">
  <!-- navbar header -->
  <div class="navbar-header bg-dark">
    <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
      <i class="glyphicon glyphicon-cog"></i>
    </button>
    <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
      <i class="glyphicon glyphicon-align-justify"></i>
    </button>
    <a href="index.php" class="navbar-brand text-lt">
      <i class="fa fa-area-chart"></i>
      <span class="hidden-folded m-l-xs">bitdiv</span>
    </a>
  </div>
  <!-- / navbar header -->

  <!-- navbar collapse -->
  <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <!-- buttons -->
    <div class="nav navbar-nav hidden-xs">
      <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
        <i class="fa fa-dedent fa-fw text"></i>
        <i class="fa fa-indent fa-fw text-active"></i>
      </a>

    </div>
    <!-- / buttons -->

    <!-- link and dropdown -->
    <ul class="nav navbar-nav hidden-sm">
           <!--  <li class="dropdown pos-stc">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <span>Help</span>
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu wrapper w-full bg-white">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-xs-6">
                                    <ul class="list-unstyled l-h-2x">
                                        <li>
                                            <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Tutorial</a>
                                        </li>

                    <li>
                      <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Help</a>
                    </li>

                  </ul>
                </div>

              </div>

            </li> -->

          </ul>
          <!-- / link and dropdown -->

          <script type="text/javascript">
            function SubmitFrm(){
              stockCode = $("#stockCode").val().toUpperCase();
              window.location.href = 'http://eng.utah.edu/~mcmullen/BitDiv_Stripped/html/ui_chart.php?stocks='+stockCode;
            }
          </script>


          <!-- search form -->
          <form class="navbar-form navbar-form-sm navbar-left shift" >
            <div class="form-group">
              <div class="input-group">
                <input type="text" id="stockCode" name="stocks" class="typeahead-devs input-sm bg-light no-border rounded padder" placeholder="Search stocks..." />
                <span class="input-group-btn">
                  <button type="submit" onClick="SubmitFrm();return false;" class="btn btn-large bg-light rounded"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </div>
          </form>

          <!-- / search form -->

          <!-- nabar right -->
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <i class="icon-bell fa-fw"></i>
                <span class="visible-xs-inline">Notifications</span>
                <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
              </a>
              <!-- dropdown -->
              <div class="dropdown-menu w-xl animated fadeInUp">
                <div class="panel bg-white">
                  <div class="panel-heading b-light bg-light">
                    <strong>You have <span>2</span> notifications</strong>
                  </div>
                  <div class="list-group">
                    <a href class="media list-group-item">
                    </span>
                    <span class="media-body block m-b-none">
                      Buy Stocks!<br>
                    </span>
                  </a>
                  <a href class="media list-group-item">
                    <span class="media-body block m-b-none">
                      Welcome!<br>
                    </span>
                  </a>
                </div>

              </div>
            </div>
            <!-- / dropdown -->
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="hidden-sm hidden-md"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></span> <b class="caret"></b>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w">

              <li>
                <a href>
                  <span> <a href="user_setup.php">Settings</a> </span>
                </a>
              </li>
              <li>
                <a href="page_profile.php">Profile</a>
              </li>

              <li class="divider"></li>
              <li>
                <a href="logout.php">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
      <!-- / navbar collapse -->
    </header>
    <!-- / header -->

    <!-- aside -->
    <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">


          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Navigation</span>
              </li>
              <li>
                <a href="index.php">
                  <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                  <span class="font-bold">Dashboard</span>
                </a>

              </li>

              <li class="line dk"></li>

              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Your Items</span>
              </li>
<!--
                    <li>
                        <a href="ui_chart.php">
                            <i class="glyphicon glyphicon-signal"></i>
                            <span>Research Center</span>
                        </a>
                      </li> -->
                      <li>
                        <a href="page_portfolios.php">
                          <i class="fa fa-money"></i>
                          <span>My Portfolios</span>
                        </a>
                      </li>
<!--
                    <li class="line dk hidden-folded"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Your Stuff</span>
                      </li> -->
                      <li>
                        <a href="page_profile.php">
                          <i class="icon-user icon text-success-lter"></i>
                          <span>Profile</span>
                        </a>
                      </li>
                      <li>
                        <a href="page_friend.php">
                          <i class="icon-user icon text-success-lter"></i>
                          <span>Following</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <!-- nav -->
                </div>
              </div>
            </aside>
            <!-- / aside -->

            <script type="text/javascript" src="js/bootstrap.js"></script>
            <script type="text/javascript" src="js/typeahead.js"></script>


            <script src="http://code.highcharts.com/stock/highstock.js"></script>
            <script src="http://code.highcharts.com/highcharts-more.js"></script>
            <script src="http://code.highcharts.com/modules/heatmap.js"></script>



            <script src="js/algs.js"></script>
            <script src="js/stock.js"></script>
