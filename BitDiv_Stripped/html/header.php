<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/typeahead.js"></script> 
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
  name: 'accounts',
  local: ["A: Agilent Technologies", "AA", "AAME", "AAN", "AAON", "AAP", "AAT", "AAPL", "AAWW", "ABAX", "ABC", "ABCB", "ABCD", "ABCO", "AB", "ABFS", "ABG", "ABIO", "ABM", "ABMC", "ABMD", "ABPI", "ABT", "ABTL", "ACAD", "ACAT", "ABR", "ACC", "ACCL", "ACE", "ACEL", "ACET", "ACFC", "ACFN", "ACCO", "ACGL", "ACHC", "ACHN", "ACI", "ACIW", "ACM", "ACLS", "ACMP", "ACN", "ACNB", "ACO", "ACOR", "ACPW", "ACRE", "ACRX", "ACTG", "ACU", "ACUR", "ACW", "ACXM", "ACY", "ADAT", "ADBE", "ADC", "ADEP", "ADES", "ADI", "ADK", "ADM", "ADNC", "ADP", "ADS", "ADSK", "ADT", "ADUS", "ADTN", "ADVS", "AE", "AEC", "AEE", "AEGN", "AEGR", "AEHR", "AEIS", "AEL", "AEO", "AEP", "AEPI", "AERG", "AES", "AET", "AERT", "AETI", "AF", "AEY", "AFA", "AFAM", "AFCB", "AFCE", "AFFM", "AFFX", "AFFY", "AFH", "AFG", "AFL", "AFM", "AFOP", "AFSI", "AGCO", "AGEN", "AGII", "AGIIL", "AGM", "AGN", "AGNC", "AGO", "AGNCP", "AGX", "AGYS", "AHC", "AHGP", "AHL", "AHPI", "AHS", "AHT", "AI", "AIG", "AIMC", "AIQ", "AIR", "AIRM", "AIRT", "AIT", "AIV", "AIZ", "AJG", "AKR", "AKAM", "AKRX", "AKS", "ALB", "ALCO", "ALCS", "ALE", "ALGT", "ALIM", "ALGN", "ALJ", "ALK", "ALKS", "ALL", "ALG", "ALEX", "ALLB", "ALOG", "ALNY", "ALR", "ALOT", "ALSE", "ALSK", "ALSN", "ALTI", "ALV", "ALTR", "ALXA", "ALXN", "AMAG", "AMAT", "ALX", "AMBA", "AMBT", "AMCC", "AMCF", "AMCX", "AMD", "AME", "AMED", "AMG", "AMGN", "AMIC", "AMID", "AMIN", "AMKR", "AMNB", "AMOT", "AMP", "AMPE", "AMRB", "AMRC", "AMRE", "AMRI", "AMRS", "AMSC", "AMSF", "AMS", "AMSG", "AMSWA", "AMT", "AMTD", "AMTG", "AMTY", "AMWD", "AN", "ANAC", "AMZN", "ANAD", "ANAT", "ANCB", "ANCX", "ANDA", "ANDAU", "ANDAW", "ANEN", "ANGI", "ANF", "ANGO", "ANIK", "ANLY", "ANDE", "ANN", "ANH", "ANR", "ANSS", "ANTH", "ANTP", "ANV", "AOL", "AOS", "AOSL", "AP", "APA", "APAGF", "APAM", "APC", "APD", "APEI", "APFC", "APH", "API", "APO", "APOG", "APL", "APP", "APOL", "APPY", "APRI", "APU", "APT", "ARAY", "ARCI", "AOI", "ANCI", "ARCP", "ARCW", "ARDM", "ARDNA", "AREX", "ARI", "ARII", "ARKR", "ARL", "ARLP", "ARNA", "AQQ", "AROW", "ARP", "ARQL", "ARR", "ARRS", "ARRY", "ARTC", "ARTNA", "ARTW", "ARE", "ARTX", "ARUN", "ARW", "ARWR", "ASBB", "ASBC", "ASBCW", "ARSD", "ASBI", "ASCA", "ASCMA", "ASEI", "ARG", "ARX", "ASH", "ASIA", "ASNA", "ASPS", "ASTC", "ASTE", "ASTI", "ASRV", "ASUR", "ASYS", "ATEA", "ATEC", "ATHN", "ATHX", "ATK", "ATI", "ATLC", "ATMI", "ATML", "ATNI", "ASTM", "ATNY", "ATO", "ATOS", "ATR", "ATLO", "ATRM", "ATRO", "ATRS", "ATRC", "ATU", "ATRI", "ARO", "ASFI", "ATVI", "ATW", "ARIA", "ATX", "AUBN", "AUXL", "AVA", "AVAV", "AVB", "AVEO", "AVHI", "AVNR", "AVID", "AVGO", "AVNW", "AVP", "AVSR", "AVT", "AVX", "AVY", "AWAY", "AWH", "AWI", "AWK", "AWRE", "AWX", "AXAS", "AXDX", "AXE", "AXL", "AXLL", "AXN", "AXP", "AXR", "AXS", "AXTI", "AYI", "AZO", "AZPN", "B", "AZZ", "BA", "BABY", "BAC", "BAGL", "BAGR", "BAH", "BAMM", "BANF", "BANC", "BANR", "BAS", "BASI", "BAX", "BBBY", "BBG", "BBGI", "BBNK", "BBOX", "BBRG", "BBSI", "BBX", "BC", "BCC", "BCEI", "BCO", "BCOR", "BCOV", "BCPC", "BCR", "BCRX", "BDCO", "BDE", "BDGE", "BDL", "BDN", "BDMS", "BDR", "BDSI", "BEAV", "BEBE", "BDX", "BECN", "BELFA", "BELFB", "BEN", "BERK", "BERY", "BFAM", "BFB", "BFIN", "BG", "BGC", "BGCP", "BGFV", "BGG", "BGMD", "BGS", "BH", "BHB", "BHE", "BHI", "BHRT", "BIG", "BIIB", "BIOC", "BIOD", "BIOF", "BIOL", "BIRT", "BJRI", "BKBK", "BKD", "BKE", "BKH", "BKJ", "BKMU", "BKOR", "BKS", "BKU", "BKW", "BKYF", "BLDR", "BLIN", "BLKB", "BLL", "BLK", "BLMN", "BLMT", "BLOX", "BMC", "BMI", "BMS", "BMTC", "BMY", "BNCL", "BNCN", "BOBE", "BOCH", "BODY", "BOFI", "BOH", "BOKF", "BOLT", "BONE", "BONT", "BOTA", "BOOM", "BPFH", "BOX", "BOTJ", "BPL", "BPOP", "BPI", "BPZ", "BR", "BRC", "BRCD", "BREW", "BRKA", "BRID", "BRKL", "BRCM", "BRKR", "BRKS", "BRLI", "BRN", "BRO", "BRS", "BRSS", "BRT", "BSDM", "BSET", "BSPM", "BSQR", "BSRR", "BTH", "BSX", "BTN", "BTU", "BTUI", "BTX", "BUSE", "BV", "BVSN", "BVX", "BWA", "BWC", "BWLD", "BWP", "BWS", "BXC", "BXP", "BXS", "BYD", "BYFC", "BYI", "BYLK", "BZC", "BZH", "C", "CA", "CAAS", "CAB", "CAC", "CACB", "CACC", "CACG", "CACGU", "CACGW", "CACI", "CADC", "CACH", "CADX", "CAG", "CAH", "CAFI", "CAK", "CAKE", "CALD", "CALI", "CALL", "CALM", "CALX", "CAM", "CAMP", "CAP", "CAR", "CARB", "CARV", "CAS", "CASH", "CASM", "CASS", "CASY", "CAT", "CATM", "CATO", "CATY", "CAVM", "CAW", "CB", "CBAK", "CBAN", "CBB", "CBEY", "CBF", "CBG", "CBI", "CBIN", "CBK", "CBLI", "CBL", "CBM", "CBMX", "CBMXW", "CBNJ", "CBNK", "CBOE", "CBPO", "CBR", "CBRL", "CBRX", "CBS", "CBSH", "CBST", "CBT", "CBU", "CBZ", "CCBG", "CCF", "CCC", "CCE", "CCG", "CCI", "CCIX", "CCK", "CCL", "CCMP", "CCNE", "CCO", "CCOI", "CCRN", "CCUR", "CDI", "CDE", "CDII", "CDR", "CDXS", "CDNS", "CDZI", "CEB", "CECE", "CDTI", "CECO", "CELG", "CELGZ", "CEMP", "CENT", "CENTA", "CEMI", "CENX", "CEP", "CERN", "CERS", "CETV", "CEVA", "CF", "CFBK", "CERE", "CFFN", "CFFI", "CFI", "CFNL", "CFNB", "CFN", "CFR", "CFX", "CG", "CGA", "CGNX", "CGI", "CHD", "CHDX", "CHBT", "CHE", "CHEF", "CHCI", "CHEV", "CHFC", "CHCO", "CHFN", "CHGS", "CHH", "CHK", "CHKE", "CHLN", "CHMG", "CHMP", "CHMT", "CHRW", "CHS", "CHSCP", "CHTP", "CHSP", "CHUY", "CHYR", "CI", "CIDM", "CIEN", "CIFC", "CIM", "CINF", "CIR", "CIT", "CITZ", "CIX", "CIZN", "CJJD", "CKP", "CL", "CLB", "CLBH", "CLC", "CLCT", "CLD", "CLDT", "CKX", "CLDX", "CLF", "CLFD", "CLIR", "CLMS", "CLNE", "CLNT", "CLNY", "CLR", "CLRO", "CLRX", "CLSN", "CLW", "CLVS", "CLX", "CLUB", "CMC", "CMA", "CMCO", "CMCSK", "CME", "CMCSA", "CMFO", "CMG", "CMI", "CMKG", "CMLP", "CMLS", "CMP", "CMRO", "CMN", "CMRX", "CMTL", "CNBKA", "CNC", "CNDO", "CNK", "CNL", "CNA", "CNBC", "CNO", "CNMD", "CNOB", "CNQR", "CNS", "CNSI", "CNSL", "CNW", "CNX", "CNYD", "COBK", "COBZ", "COCO", "CODI", "COF", "COG", "COH", "COHR", "COKE", "COL", "COHU", "COLB", "COLM", "CONN", "COO", "COOL", "COP", "COR", "CORT", "CORX", "COSI", "COST", "COT", "COV", "COVR", "COWN", "CPAH", "CPB", "CPE", "CPF", "CPGI", "CPHD", "CPIX", "CPHC", "CPN", "CPRT", "CPLA", "CPRX", "CPSI", "CPSL", "CPST", "CPT", "CRAI", "CPWR", "CRAY", "CRDC", "CREE", "CRIS", "CRK", "CRL", "CRMD", "CRMT", "CROX", "CRMB", "CRR", "CRRC", "CRRS", "CRS", "CRTX", "CRUS", "CRV", "CRVL", "CRVP", "CRWS", "CRY", "CSBK", "CSCD", "CSC", "CSCO", "CSFL", "CSGP", "CSGS", "CSH", "CSHB", "CSII", "CSL", "CSOD", "CSPI", "CSS", "CST", "CSV", "CSWC", "CSX", "CTAS", "CTB", "CTBI", "CTCT", "CTG", "CTHR", "CTIB", "CTL", "CTO", "CTRN", "CTS", "CTSH", "CTWS", "CTXS", "CUB", "CUBI", "CUI", "CUNB", "CUO", "CUTR", "CUZ", "CVA", "CVBF", "CVC", "CVBK", "CVCO", "CVCY", "CVD", "CVG", "CVGI", "CVI", "CVGW", "CVLT", "CVLY", "CVM", "CVO", "CVR", "CVTI", "CVS", "CVU", "CVV", "CVVT", "CVX", "CW", "CWBC", "CWCO", "CWEI", "CWH", "CWHN", "CWST", "CWT", "CWTR", "CXDC", "CXO", "CXP", "CXPO", "CXW", "CY", "CYAN", "CYB", "CYBE", "CYBX", "CYCC", "CYCCP", "CYH", "CYN", "CYNI", "CYNO", "CYS", "CYT", "CYTK", "CYTR", "CYTX", "CYTXW", "CZFC", "CZNC", "CZWI", "D", "DAEG", "CZR", "DAIO", "DAL", "DAKT", "DAN", "DAR", "DARA", "DATA", "DAVE", "DBD", "DBLE", "DBLEP", "DCI", "DCO", "DCOM", "DCT", "DCTH", "DD", "DDD", "DDDC", "DDE", "DDR", "DDS", "DE", "DECK", "DEER", "DEI", "DEL", "DENN", "DEPO", "DEST", "DF", "DFS", "DFT", "DFZ", "DG", "DGI", "DGAS", "DGICA", "DGICB", "DGII", "DGIT", "DGLY", "DGSE", "DGX", "DHI", "DHIL", "DHR", "DHX", "DHRM", "DIET", "DIN", "DIOD", "DISCA", "DISCB", "DISCK", "DISH", "DIS", "DJCO", "DIT", "DK", "DKL", "DKS", "DLB", "DLA", "DLGC", "DLLR", "DLIA", "DLHC", "DLPH", "DLR", "DLTR", "DLX", "DMD", "DMLP", "DMRC", "DMND", "DNB", "DNDN", "DNKN", "DNR", "DO", "DNBF", "DORM", "DOV", "DOW", "DPS", "DPM", "DPW", "DRAD", "DRAM", "DRC", "DRCO", "DRE", "DPZ", "DRIV", "DRH", "DRI", "DRL", "DRQ", "DRRX", "DRTX", "DSCI", "DSCO", "DSPG", "DSKX", "DSS", "DSTI", "DSW", "DTE", "DTLK", "DTSI", "DTV", "DUK", "DVA", "DV", "DVAX", "DVCR", "DVD", "DVN", "DVR", "DWA", "DW", "DWCH", "DWRE", "DWSN", "DX", "DXCM", "DXLG", "DXM", "DXPE", "DXR", "DY", "DYAX", "DYII", "DYNIQ", "DYSL", "EAC", "EA", "EBF", "EAT", "EBIX", "EBAY", "EBMT", "EBSB", "EBTC", "EBS", "ECHO", "ECL", "ECOL", "ECOM", "ECTE", "ECTY", "ECYT", "ED", "EDGW", "EDMC", "EDE", "EDR", "EDUC", "EEI", "EFC", "EEFT", "EFII", "EFOI", "EFSC", "EFX", "EGAN", "EGHT", "EGL", "EGN", "EGOV", "EGY", "EHTH", "EIG", "ELGX", "ELLI", "ELNK", "ELRC", "ELX", "EMCI", "ELY", "EME", "END", "ENDP", "ENH", "ENR", "ENS", "ENPH", "ENSG", "ENTG", "ENTA", "ENTR", "ENV", "ENZN", "EOPN", "EPAM", "EPAY", "EPIQ", "EPM", "EPL", "EPZM", "EQIX", "EQU", "ERA", "ERII", "ERIE", "ESBF", "ESGR", "ESE", "ESIO", "ESSA", "ETH", "ETM", "EVC", "EVTC", "ESL", "ESC", "EVR", "EWBC", "EV", "EXAC", "EXAS", "EXAR", "EXAM", "EXEL", "EXH", "EXLS", "EXPO", "EXPR", "EXP", "EXTR", "EXXI", "EXR", "EZPW", "F", "FABK", "FAC", "FAF", "FALC", "FANG", "FARM", "FARO", "FAST", "FB", "FBC", "FBHS", "FBIZ", "FBMI", "FBMS", "FBNC", "FBNK", "FBP", "FBRC", "FBSS", "FC", "FCAP", "FCCY", "FCBC", "FCCO", "FCEL", "FCF", "FCFS", "FCH", "FCLF", "FCN", "FCNCA", "FCTY", "FCX", "FCZA", "FDEF", "FDO", "FDP", "FDS", "FCS", "FDML", "FDX", "FE", "FEIC", "FEIM", "FES", "FELE", "FET", "FFBC", "FFBCW", "FF", "FFBH", "FFEX", "FFG", "FFIC", "FFIN", "FFIV", "FFKT", "FFKY", "FFNM", "FFNW", "FGP", "FHCO", "FHN", "FIBK", "FICO", "FIG", "FII", "FINL", "FIO", "FIRE", "FIS", "FISI", "FITB", "FISV", "FIVE", "FIX", "FIZZ", "FL", "FLDM", "FLIC", "FLEX", "FLIR", "FLL", "FLO", "FLOW", "FLR", "FLT", "FLTX", "FLS", "FLWS", "FLXS", "FMBI", "FMC", "FMCC", "FMD", "FMER", "FMNB", "FN", "FNB", "FNF", "FNFG", "FNGN", "FNHC", "FNLC", "FNSR", "FNMA", "FOE", "FOLD", "FONR", "FOR", "FORM", "FORR", "FORD", "FOSL", "FOX", "FOXA", "FPO", "FPP", "FR", "FRAN", "FRBK", "FRED", "FRF", "FRGI", "FRM", "FRD", "FRME", "FRNK", "FRP", "FRT", "FSBK", "FRX", "FRS", "FSBW", "FSCI", "FSFG", "FSGI", "FSI", "FSL", "FSLR", "FSP", "FST", "FSTR", "FSYS", "FTEK", "FTI", "FTK", "FTNT", "FU", "FTR", "FUBC", "FULT", "FUN", "FUNC", "FUR", "FUL", "FURX", "FWLT", "FVE", "FWRD", "FXCM", "FWV", "FXEN", "G", "GABC", "GALE", "GAIA", "GALT", "GALTU", "GAS", "GB", "GBCI", "GBL", "GBLI", "GBNK", "GBR", "GBX", "GCA", "GCAP", "GCBC", "GALTW", "GCFB", "GCI", "GCO", "GCOM", "GD", "GDOT", "GE", "GEF", "GENC", "GEO", "GEOS", "GERN", "GES", "GFF", "GEVO", "GFIG", "GFED", "GFN", "GGG", "GHDX", "GHM", "GIG", "GIFI", "GIII", "GIGA", "GILD", "GIS", "GKNT", "GLBZ", "GLCH", "GK", "GLDC", "GLOW", "GLP", "GLPW", "GLRE", "GLT", "GLF", "GLW", "GLUU", "GM", "GMAN", "GMCR", "GME", "GMED", "GMET", "GMETP", "GMO", "GNBT", "GMT", "GNC", "GNCMA", "GNE", "GNI", "GNRC", "GNTX", "GNVC", "GNW", "GOM", "GOOD", "GORO", "GOV", "GPC", "GPI", "GOOG", "GPIC", "GPN", "GPOR", "GPRE", "GPX", "GRA", "GRC", "GRPN", "GRIF", "GSBC", "GSE", "GSIG", "GSIT", "GSM", "GTI", "GTAT", "GTIV", "GTLS", "GTS", "GTN", "GUID", "GVA", "GWR", "GXP", "GY", "GWRE", "H", "HA", "HAE", "HAFC", "GTXI", "HAIN", "HALL", "HALO", "HASI", "HAWK", "HAYN", "HBCP", "HBHC", "HBI", "HBIO", "HBNC", "HCA", "HCCI", "HCI", "HCKT", "HCOM", "HCSG", "HDNG", "HCC", "HE", "HEES", "HEB", "HEI", "HEOP", "HFBC", "HF", "HFC", "HES", "HFFC", "HFWA", "HGG", "HGR", "HH", "HHC", "HHS", "HI", "HIBB", "HIG", "HII", "HIIQ", "HGSH", "HILL", "HITT", "HITK", "HIL", "HIW", "HK", "HL", "HLIT", "HLF", "HLS", "HLSS", "HME", "HMG", "HMN", "HMNF", "HMPR", "HMSY", "HMTV", "HNH", "HNR", "HNI", "HNRG", "HNSN", "HNT", "HOFT", "HOG", "HOLX", "HOMB", "HMST", "HOLL", "HOME", "HON", "HOS", "HOT", "HOTR", "HPAC", "HPCCP", "HOV", "HPOL", "HPP", "HPQ", "HPT", "HPTX", "HPY", "HRC", "HRB", "HRG", "HR", "HRL", "HRS", "HRT", "HSC", "HSH", "HSIC", "HSII", "HSKA", "HSON", "HSNI", "HSP", "HST", "HSTM", "HSY", "HT", "HTA", "HTBI", "HTBK", "HTCH", "HTCO", "HTH", "HTLD", "HTLF", "HTM", "HTS", "HTWR", "HTZ", "HUBB", "HUBG", "HUM", "HUN", "HURC", "HURN", "HUSA", "HVB", "HVT", "HW", "HWAY", "HWBK", "HWG", "HWCC", "HWKN", "HXL", "HY", "HZNP", "HZO", "IACI", "IART", "IBCA", "IBCP", "IBIO", "IBKC", "IBKR", "IBM", "IBOC", "ICAD", "IBTX", "ICCC", "ICE", "ICFI", "ICGE", "ICH", "ICON", "ICUI", "ICPT", "IDA", "IDCC", "IDIX", "IDN", "IDRA", "IDSA", "IDSY", "IDT", "IDTI", "IDXX", "IEC", "IEP", "IESC", "IEX", "IFMI", "IFNY", "IFT", "IFF", "IG", "IFON", "IGC", "IGOI", "IGTE", "IHC", "IHT", "III", "IILG", "IIN", "IIIN", "IKAN", "IKNX", "IIVI", "IL", "ILMN", "IM", "IMAX", "IMGN", "IMH", "IMCB", "IMI", "IMKTA", "IMMR", "IMMU", "IMMY", "IMN", "INAP", "IMO", "INB", "INCY", "INDB", "INFA", "INFI", "INFN", "INFU", "INGR", "ININ", "INN", "INO", "INOC", "INPH", "INS", "INSM", "INSY", "INT", "INTC", "INTT", "INTL", "INTU", "INTX", "INTG", "INTZ", "INVE", "INUV", "INVN", "INWK", "IO", "IOSP", "IOT", "IP", "IPG", "IPGP", "IPHI", "IPI", "IR", "IRBT", "IPXL", "IRC", "IRDM", "IRET", "IRG", "IRM", "IRIX", "IROQ", "IRWD", "ISBC", "ISCA", "ISH", "ISIG", "ISIL", "ISIS", "ISLE", "ISNS", "ISR", "ISRG", "ISRL", "ISSC", "ISSI", "IT", "ITG", "ITI", "ITIC", "ITMN", "ITRI", "ITT", "ITW", "IVAC", "IVC", "IVR", "IVZ", "IXYS", "JACK", "JAH", "JAKK", "JBHT", "JBL", "JBLU", "JBSS", "JBT", "JCI", "JCP", "JAXB", "JCS", "JCTCF", "JDSU", "JEC", "JFBC", "JFBI", "JKHY", "JJSF", "JMP", "JNGW", "JNJ", "JNPR", "JNS", "JOB", "JOE", "JOEZ", "JOSB", "KFY", "KKD", "KOP", "KOS", "KRO", "KTOS", "KRA", "KVHI", "KWK", "KWR", "LABL", "LAD", "KYTH", "LAMR", "LANC", "LAYN", "LBAI", "LBY", "LCI", "LCNB", "LCUT", "IRF", "LDL", "LDR", "LEA", "LEAP", "LEDS", "LECO", "LEE", "LEG", "LEI", "LF", "LFUS", "LEN", "LFVN", "LG", "LGCY", "LGF", "LGL", "LGND", "LGP", "LHCG", "LH", "LHO", "LIFE", "LII", "LIME", "LINC", "LINE", "LINTA", "LION", "LIOX", "LIVE", "LIWA", "LKFN", "LKQ", "LL", "LLEN", "LLL", "LLNW", "LLTC", "LLY", "LMAT", "LMIA", "LMCA", "LMNR", "LMNX", "LMOS", "LMT", "LNBB", "LNC", "LNCE", "LNCO", "LNDC", "LNKD", "LNN", "LNT", "LO", "LOCK", "LOAN", "LOCM", "LODE", "LOGM", "LOJN", "LOGC", "LOOK", "LOGI", "LORL", "LOPE", "LOV", "LOW", "LPHI", "LPI", "LPLA", "LPNT", "LPSN", "LPTN", "LPX", "LQDT", "LRAD", "LRCX", "LRN", "LRY", "LSBI", "LSBK", "LSCC", "LSI", "LSTR", "LTBR", "LTC", "LTM", "LTRE", "LTRX", "LTS", "LTXC", "LUB", "LULU", "LUNA", "LUV", "LVS", "LWAY", "LXK", "LXP", "LXRX", "LYB", "LYTS", "LYV", "LZB", "M", "MA", "MAA", "MAC", "MACE", "MACK", "MAG", "MAKO", "MAMS", "MAN", "MANH", "MAR", "MARK", "MAS", "MASC", "MASI", "MAT", "MATW", "MAXY", "MAYS", "MBFI", "MBLX", "MBND", "MBRG", "MBTF", "MBWM", "MCBC", "MCBF", "MCBI", "MCBK", "MCD", "MCF", "MCHP", "MCHX", "MCK", "MCO", "MCRI", "MCRS", "MCS", "MCP", "MCY", "MD", "MCZ", "MDC", "MDCI", "MDCO", "MDLZ", "MDP", "MDSO", "MDT", "MDU", "MDW", "MDVN", "MDXG", "MEAD", "MEAS", "MED", "MEET", "MEIP", "MELA", "MELI", "MEI", "MEMP", "MEMS", "MENT", "MERR", "MET", "MFA", "METR", "MFCO", "MFI", "MFLR", "MFLX", "MFNC", "MFRI", "MFRM", "MFSF", "MG", "MGAM", "MGCD", "MGLN", "MGM", "MGPI", "MGT", "MGYR", "MHFI", "MHGC", "MHO", "MGN", "MHH", "MIDD", "MIG", "MILL", "MIND", "MINI", "MHK", "MITK", "MITL", "MJN", "MKC", "MKL", "MKSI", "MKTG", "MKTO", "MKTX", "MKTY", "MLAB", "MLM", "MLHR", "MLP", "MLNK", "MLNX", "MMC", "MMP", "MMM", "MMS", "MMSI", "MNDL", "MNGA", "MN", "MNKD", "MNOV", "MNR", "MNRK", "MNRO", "MNST", "MNTA", "MNTG", "MNTX", "MO", "MOC", "MOCO", "MOD", "MODN", "MOFG", "MOGA", "MOH", "MOLX", "MOLXA", "MON", "MORN", "MOS", "MOSY", "MOV", "MOVE", "MPAA", "MPAC", "MPB", "MPET", "MPC", "MPO", "MPW", "MPWR", "MPX", "MRC", "MRCY", "MRGE", "MRH", "MRIN", "MRLN", "MRTN", "MRK", "MSCC", "MRVL", "MSCI", "MSEX", "MSFG", "MSFT", "MSG", "MSL", "MSM", "MSO", "MSTR", "MTD", "MTDR", "MTG", "MTH", "MTN", "MTOR", "MTRN", "MTRX", "MTSC", "MTSI", "MTW", "MTX", "MTZ", "MW", "MWA", "MWIV", "MWW", "MXL", "MXIM", "MXWL", "MYE", "MYGN", "MYRG", "N", "NANO", "NASB", "NATI", "NATL", "NATH", "NATR", "NAV", "NAVB", "NAVG", "NBBC", "NBIX", "NBTB", "NC", "NBTF", "NCBC", "NCI", "NBCB", "NCIT", "NCLH", "NCMI", "NCQ", "NCR", "NCT", "NCS", "NDAQ", "NDSN", "NE", "NECB", "NEE", "NEM", "NEN", "NEO", "NEOG", "NEON", "NES", "NEU", "NEWN", "NEWP", "NEWS", "NEWT", "NFEC", "NFG", "NFLX", "NFSB", "NFX", "NGL", "NGLS", "NGS", "NGSX", "NHC", "NGVC", "NHTB", "NHI", "NICK", "NIHD", "NI", "NILE", "NJR", "NKA", "NKE", "NKSH", "NKTR", "NL", "NLP", "NLS", "NLNK", "NLSN", "NLST", "NLY", "NMRX", "NNBR", "NNI", "NNN", "NOBH", "NOR", "NOC", "NOV", "NOVB", "NOW", "NP", "NPBC", "NPK", "NPO", "NPSP", "NPTN", "NR", "NRF", "NRG", "NRIM", "NRP", "NRTLQ", "NS", "NSC", "NSEC", "NSH", "NSFC", "NSIT", "NSLP", "NSM", "NSP", "NSPH", "NSR", "NSSC", "NSYS", "NTAP", "NTCT", "NTGR", "NTI", "NTIC", "NTN", "NTRS", "NTS", "NTSC", "NTWK", "NU", "NUE", "NURO", "NUS", "NUTR", "NVDA", "NVE", "NVEC", "NVR", "NWBI", "NWBO", "NWE", "NWFL", "NWLI", "NWPX", "NWY", "NX", "NXST", "NYCB", "NYMT", "NYNY", "O", "OABC", "OAK", "OAS", "OB", "OBAF", "OBCI", "OC", "OCC", "OCFC", "OCLR", "OCLS", "OCR", "OCZ", "ODFL", "ODP", "OESX", "OFED", "OFG", "OFIX", "OFLX", "ODC", "ORB", "ORBC", "ORBT", "ORCL", "OREX", "ORI", "ORLY", "ORN", "ORRF", "ORMP", "OSBC", "OSIS", "OSIR", "OSK", "OSTK", "OSUR", "OTEX", "OTTR", "OVAS", "OVBC", "OVLY", "OVRL", "OVTI", "OWW", "OXBT", "OXGN", "OXF", "OXM", "OXY", "OZM", "PAA", "PACB", "PACW", "PAG", "PAMT", "PANW", "PAR", "PARS", "PATH", "PATR", "PATK", "PAY", "PAYX", "PB", "PBCT", "PBF", "PBH", "PBHC", "PBIB", "PBI", "PBIO", "PBIP", "PBSK", "PBY", "PBYI", "PCAR", "PCBK", "PCBS", "PCCC", "PCG", "PCL", "PCLN", "PCMI", "PCP", "PCTI", "PCYG", "PCYO", "PDCE", "PDCO", "PDEX", "PDFS", "PDLI", "PDII", "PDO", "PDH", "PEBK", "PEBO", "PEB", "PEDH", "PEG", "PEGA", "PEI", "PEIX", "PENN", "PENX", "PEP", "PERF", "PERY", "PES", "PESI", "PETM", "PETS", "PEOP", "PF", "PFBI", "PFBX", "PFE", "PFG", "PFIN", "PFIS", "PFMT", "PFPT", "PFS", "PFSI", "PFSW", "PG", "PGC", "PGEM", "PGI", "PGNX", "PGTI", "PHH", "PHIIK", "PHMD", "PHX", "PICO", "PIKE", "PII", "PIR", "PJC", "PKD", "PKE", "PKG", "PKOH", "PKT", "PL", "PLAB", "PLCE", "PLCM", "PLMT", "PLPC", "PLOW", "PLXS", "PLT", "PLUS", "PLXT", "PMC", "PMCS", "PNBC", "PMFG", "PNBK", "PNC", "PNFP", "PNK", "PNM", "PNRA", "PNRG", "PNW", "PNX", "PNY", "PODD", "POL", "POM", "POOL", "POPE", "POST", "POR", "POWI", "POWL", "POWR", "POZN", "PPBI", "PPC", "PPG", "PPHM", "PPL", "PPO", "PPS", "PQ", "PRA", "PRAA", "PRCP", "PRE", "PRFT", "PRGO", "PRGS", "PRGX", "PRI", "PRIM", "PRK", "PRKR", "PRLS", "PRMW", "PRO", "PROV", "PRPH", "PRSC", "PRLB", "PRTA", "PRTS", "PRU", "PRXI", "PRSS", "PSA", "PSB", "PSBH", "PSDV", "PSEM", "PSIX", "PSMI", "PSMT", "PRXL", "PSTB", "PSTI", "PSTR", "PSUN", "PSX", "PTEK", "PTGI", "PTIE", "PTEN", "PTIX", "PTLA", "PTNT", "PTP", "PTRY", "PTSI", "PULB", "PULS", "PTX", "PVA", "PVFC", "PVH", "PW", "PWOD", "PX", "PVTB", "PXLW", "PXD", "PWX", "PZG", "PZZI", "Q", "QADA", "QADB", "QCCO", "QBAK", "QCOM", "QCOR", "QDEL", "QCRH", "QKLS", "QLGC", "QLIK", "QLTI", "QLTY", "QLYS", "QNST", "QRE", "QSII", "QTM", "QTWW", "QUAD", "QUIK", "R", "RAD", "RAI", "RALY", "RAS", "RATE", "RAVN", "RAX", "RBCAA", "RBCN", "RBPAA", "RCII", "RCKB", "RCKY", "RCL", "RCON", "RCPT", "RDC", "RDI", "RDEN", "RDIB", "RDNT", "RE", "RECN", "REED", "REFR", "REG", "REGN", "REIS", "RELL", "RELV", "REMY", "REN", "RENT", "RES", "RESI", "REX", "REXI", "REXX", "RF", "RFIL", "RFMD", "RFP", "RGA", "RGC", "RGCO", "RGDX", "RGEN", "RGLS", "RGLD", "RGP", "RGR", "RGS", "RH", "RHI", "RHT", "RICK", "RIGL", "RIMG", "RIVR", "RJF", "RKT", "RKUS", "RL", "RLD", "RLGT", "RLGY", "RLH", "RLI", "RLJE", "RLOG", "RM", "RMBS", "RMCF", "RMD", "RMKR", "RNDY", "RNF", "RNIN", "RNN", "RNO", "RNR", "RNST", "RNWK", "ROC", "ROCM", "ROG", "ROIA", "ROIAK", "ROIC", "ROK", "ROL", "ROLL", "ROMA", "ROP", "ROSE", "ROST", "ROVI", "ROX", "RP", "RPAI", "RPM", "RPRX", "RPT", "RPTP", "RPXC", "RRD", "RRC", "RRGB", "RRTS", "RSE", "RSG", "RSH", "RSOL", "RSYS", "RTI", "RTIX", "RTK", "RTN", "RUE", "RUSHA", "RUSHB", "RVLT", "RVP", "RVM", "RVSB", "RVBD", "RXN", "RYL", "RYN", "SAAS", "SAH", "SAFM", "SAL", "SAM", "SANM", "SANW", "RJET", "SAPE", "SASR", "SALM", "SATS", "SAVE", "SBAC", "SBCF", "SBGI", "SBH", "SBSA", "SBSI", "SBUX", "SCCO", "SCEI", "SCG", "SCHL", "SCHW", "RSTI", "SCI", "SCHN", "SCIL", "SCKT", "SCL", "SCLN", "SCMR", "SCON", "SCOR", "SCS", "SCSC", "SCSS", "SCTY", "SCU", "SCX", "SD", "SCVL", "SE", "SEAC", "SBBX", "SEB", "SEAS", "SEE", "SEIC", "SEM", "SEMG", "SENEA", "SENEB", "SEV", "SF", "SFE", "SFG", "SFLY", "SFNC", "SGA", "SGB", "SGC", "SGI", "SGEN", "SGMA", "SGMO", "SGNT", "SGMS", "SGY", "SGYP", "SHLD", "SHEN", "SHLM", "SHLO", "SHOO", "SHOR", "SIG", "SHOS", "SIGA", "SIGM", "SIMG", "SIRO", "SIVB", "SIX", "SJI", "SJW", "SKH", "SKT", "SKUL", "SKX", "SKY", "SKYW", "SLAB", "SLB", "SLCA", "SLG", "SLGN", "SLH", "SLI", "SLM", "SLMAP", "SLP", "SLTC", "SLTM", "SLXP", "SM", "SMA", "SMED", "SMCI", "SMG", "SMIT", "SMLP", "SMMF", "SMP", "SMPL", "SMRT", "SMSI", "SMTC", "SMTX", "SN", "SNA", "SNAK", "SNBC", "SNCR", "SNDK", "SNFCA", "SNH", "SNI", "SNMX", "SNPS", "SNTA", "SNTS", "SNSS", "SNV", "SNX", "SO", "SOCB", "SOFO", "SOHU", "SON", "SONA", "SONC", "SONS", "SONT", "SORL", "SPA", "SPAN", "SPAR", "SPB", "SPBC", "SPCHA", "SPCHB", "SPEX", "SPF", "SPG", "SPH", "SPLK", "SPIR", "SPLP", "SPLS", "SPN", "SPNC", "SPPI", "SPR", "SPRO", "SPRT", "SPSC", "SPU", "SPTN", "SPW", "SPWR", "SQI", "SQNM", "SR", "SRCE", "SRDX", "SRCL", "SREV", "SRE", "SRI", "SRPT", "SRT", "SSD", "SSI", "SSFN", "SSN", "SSNC", "SSNI", "SSP", "SSS", "SSTK", "SSY", "ST", "STAA", "STAG", "STBA", "STBZ", "STC", "STE", "STEC", "STEI", "STEL", "STEM", "STFC", "STI", "STJ", "STL", "SNHY", "STLD", "STLY", "STML", "STND", "STMP", "STNR", "STR", "STON", "STRA", "STRI", "STRL", "STRM", "STRN", "STRS", "STRT", "STRZA", "STSA", "STS", "STRZB", "STSI", "STX", "STXS", "STZ", "SUBK", "SUI", "SUMR", "SUNE", "SUP", "SUPX", "SURG", "SUPN", "SUSP", "SUSQ", "SUTR", "SVBL", "SVBI", "SVT", "SVU", "SWC", "SWFT", "SWHC", "SWI", "SWK", "SWKS", "SWM", "SWN", "SWS", "SWX", "SWY", "SXC", "SXE", "SXI", "SXL", "SXT", "SYA", "SYBT", "SYK", "SYKE", "SYMC", "SYMM", "SYMX", "SYN", "SYNA", "SYNC", "SYNM", "SYPR", "SYRG", "SYUT", "SYY", "SZYM", "T", "TA", "TACT", "TAIT", "TAL", "TAP", "TASR", "TAST", "TAT", "TAX", "TAYC", "TAYCP", "TAYD", "TBAC", "TBI", "TBNK", "TBOW", "TBIO", "TC", "TCB", "TCBI", "TCBK", "TCCO", "TCI", "TCO", "TCP", "TDC", "TDW", "TDG", "TDY", "TE", "TECD", "TECH", "TEAR", "TECUA", "TECUB", "TEG", "TEL", "TELK", "TER", "TEN", "TESS", "TESO", "TEX", "TFCO", "TFM", "TFSL", "TGC", "TFX", "TG", "TGE", "TGI", "TGT", "THC", "THFF", "THG", "THLD", "THO", "THI", "THOR", "THR", "THRD", "THRM", "THRX", "THS", "THTI", "TIBX", "TIF", "TIGR", "TIK", "TIS", "TISI", "TITN", "TIVO", "TJX", "TKOI", "TKR", "TLAB", "TLF", "TLLP", "TLR", "TLYS", "TMH", "TMHC", "TAM", "TMNG", "TMO", "TMP", "TNAV", "TNC", "TNGN", "TNGO", "TNH", "TOF", "TOFC", "TOL", "TORM", "TOWR", "TPC", "TPH", "TPL", "TPLM", "TPX", "TQNT", "TR", "TRAK", "TREE", "TREX", "TRC", "TRGT", "TRIP", "TRIT", "TRLA", "TRLG", "TRMB", "TRMK", "TRNO", "TRNS", "TROV", "TRNX", "TROVU", "TROW", "TRR", "TRST", "TRT", "TRV", "TRXI", "TRW", "TSBK", "TSC", "TSCO", "TSH", "TSO", "TSLA", "TSPT", "TSRA", "TSN", "TSRO", "TSYS", "TTC", "TTEC", "TTEK", "TTGT", "TTI", "TTMI", "TTPH", "TTWO", "TUES", "TUMI", "TUP", "TW", "TWC", "TWER", "TWIN", "TWMC", "TWI", "TWO", "TWTC", "TWX", "TXI", "TXN", "TXRH", "TXT", "TYC", "TYL", "TYPE", "TZOO", "UACL", "UAHC", "UA", "UAL", "UAM", "UAMY", "UAN", "UBA", "UBCP", "UBFO", "UBNK", "UBNT", "UBOH", "UBP", "UBSH", "UBSI", "UCFC", "UCI", "UCTT", "UDR", "UEC", "UEIC", "UEPS", "UFCS", "UFI", "UFPI", "UFPT", "UFS", "UG", "UHAL", "UGI", "UHT", "UIHC", "UIL", "UIS", "UHS", "ULBI", "ULGX", "ULTA", "ULTI", "UMPQ", "UNAM", "UNB", "UNF", "UNFI", "UNH", "UNIS", "UNM", "UNP", "UNS", "UNTD", "UNTK", "UNTY", "UPI", "UPIP", "UPL", "UPS", "UQM", "URBN", "URG", "URI", "URRE", "URS", "URZ", "USAK", "USAP", "USAT", "USATP", "USB", "USBI", "USEG", "USG", "USLM", "USMD", "USMO", "USNA", "USTR", "USU", "UTEK", "UTI", "UTHR", "UTIW", "UTL", "UTX", "UUU", "UVSP", "UVV", "UWN", "V", "VAC", "VAL", "VALU", "VALV", "VAR", "VASC", "VASO", "VBFC", "VC", "VCBI", "VCLK", "VCRA", "VDSI", "VECO", "VG", "VGZ", "VHC", "VHI", "VIA", "VIAB", "VIAS", "VICL", "VICR", "VIDE", "VIFL", "VII", "VIRC", "VIVO", "VLGEA", "VITC", "VLO", "VLTR", "VLY", "VMC", "VMI", "VNDA", "VNO", "VNTV", "VOCS", "VOLC", "VOXX", "VOYA", "VPG", "VPHM", "VPRT", "VRA", "VRML", "VRNM", "VRNT", "VRS", "VRSK", "VRSN", "VRTA", "VRTB", "VRTS", "VRTU", "VRTX", "VSAT", "VSBN", "VSCI", "VSEC", "VSH", "VSR", "VSTM", "VTNC", "VTNR", "VTR", "VTSS", "VTUS", "VVUS", "VVTV", "VVC", "VYFC", "VZ", "WAB", "WABC", "WAFD", "WAG", "WAGE", "WAIR", "WAL", "WAT", "WAVE", "WAVX", "WAYN", "WBCO", "WBMD", "WBS", "WCC", "WCG", "WCN", "WCRX", "WD", "WDAY", "WDC", "WDFC", "WDR", "WEC", "WEN", "WEST", "WEBK", "WETF", "WFBI", "WEYS", "WFD", "WFM", "WFC", "WFT", "WG", "WGA", "WGL", "WGO", "WHG", "WHLR", "WHR", "WIBC", "WIFI", "WINA", "WIRE", "WLB", "WLBPZ", "WLDN", "WLH", "WLFC", "WLL", "WLP", "WLT", "WM", "WMAR", "WLK", "WMB", "WMGI", "WMK", "WMT", "WOR", "WPCS", "WPX", "WPZ", "WRD", "WRE", "WRES", "WRI", "WRLD", "WSBC", "WSBF", "WSCI", "WSM", "WSFS", "WSO", "WST", "WSTC", "WSTL", "WTBA", "WSTG", "WTFC", "WTI", "WTM", "WTR", "WTS", "WTSL", "WTT", "WU", "WUHN", "WVFC", "WVVI", "WWAV", "WWD", "WWE", "WWW", "WWWW", "WY", "WYN", "WYNN", "WYY", "X", "XBKS", "XEC", "XEL", "XL", "XLNX", "XNPT", "XOM", "XOMA", "XONE", "XOOM", "XOXO", "XPLR", "XPO", "XRAY", "XRM", "XRSC", "XRX", "XWES", "XXIA", "XYL", "Y", "YDKN", "YELP", "YHOO", "YOD", "YONG", "YUM", "Z", "ZAGG", "ZAZA", "ZBB", "ZBRA", "ZEP", "ZEUS", "ZHNE", "ZIGO", "ZINC", "ZION", "ZIPR", "ZIOP", "ZIXI", "ZLC", "ZLCS", "ZLTQ", "ZMH", "ZN", "ZNGA", "ZOLT", "ZOOM", "ZQK", "ZUMZ"]

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
        <a href="#/" class="navbar-brand text-lt">
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
            <li class="dropdown pos-stc">
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

            </li>

        </ul>
        <!-- / link and dropdown -->

        <!-- search form -->
        <form class="navbar-form navbar-form-sm navbar-left shift" method="POST" action="#">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="accounts" class="typeahead-devs input-sm bg-light no-border rounded padder" placeholder="Search stocks...">
                    <span class="input-group-btn">
                <button type="submit" class="btn btn-large bg-light rounded"><i class="fa fa-search"></i></button>
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
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a ui-sref="app.page.profile">Profile</a>
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
                        <span>Components</span>
                    </li>

                    <li>
                        <a href="ui_chart.php">
                            <i class="glyphicon glyphicon-signal"></i>
                            <span>Research Center</span>
                        </a>
                    </li>
                    <li>
                        <a href="page_portfolios.php">
                            <i class="fa fa-money"></i>
                            <span>My Portfolios</span>
                        </a>
                    </li>

                    <li class="line dk hidden-folded"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Your Stuff</span>
                    </li>
                    <li>
                        <a href="page_profile.php">
                            <i class="icon-user icon text-success-lter"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>
<!-- / aside -->
