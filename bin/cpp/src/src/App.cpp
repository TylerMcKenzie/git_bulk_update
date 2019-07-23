// Generated by Haxe 3.4.7
#include <hxcpp.h>

#ifndef INCLUDED_EReg
#include <EReg.h>
#endif
#ifndef INCLUDED_Sys
#include <Sys.h>
#endif
#ifndef INCLUDED_haxe_io_Bytes
#include <haxe/io/Bytes.h>
#endif
#ifndef INCLUDED_haxe_io_Input
#include <haxe/io/Input.h>
#endif
#ifndef INCLUDED_haxe_io_Path
#include <haxe/io/Path.h>
#endif
#ifndef INCLUDED_src_App
#include <src/App.h>
#endif
#ifndef INCLUDED_src_Cli
#include <src/Cli.h>
#endif
#ifndef INCLUDED_src_util_Hub
#include <src/util/Hub.h>
#endif
#ifndef INCLUDED_sys_FileSystem
#include <sys/FileSystem.h>
#endif
#ifndef INCLUDED_sys_io_File
#include <sys/io/File.h>
#endif
#ifndef INCLUDED_sys_io_Process
#include <sys/io/Process.h>
#endif

HX_DEFINE_STACK_FRAME(_hx_pos_9aa8d6444802cb78_12_new,"src.App","new",0x5207d669,"src.App.new","App.hx",12,0xc43e94dd)
HX_LOCAL_STACK_FRAME(_hx_pos_9aa8d6444802cb78_48_run,"src.App","run",0x520aed54,"src.App.run","App.hx",48,0xc43e94dd)
static const ::String _hx_array_data_62186df7_5[] = {
	HX_("diff",05,5c,69,42),HX_("--name-only",8e,ea,71,0d),
};
static const ::String _hx_array_data_62186df7_6[] = {
	HX_("diff",05,5c,69,42),
};
HX_LOCAL_STACK_FRAME(_hx_pos_9aa8d6444802cb78_99_run,"src.App","run",0x520aed54,"src.App.run","App.hx",99,0xc43e94dd)
static const ::String _hx_array_data_62186df7_8[] = {
	HX_("checkout",c6,b4,ff,ac),HX_("-",2d,00,00,00),
};
HX_LOCAL_STACK_FRAME(_hx_pos_9aa8d6444802cb78_114_error,"src.App","error",0x9e722611,"src.App.error","App.hx",114,0xc43e94dd)
HX_LOCAL_STACK_FRAME(_hx_pos_9aa8d6444802cb78_120_getAllFiles,"src.App","getAllFiles",0x58171755,"src.App.getAllFiles","App.hx",120,0xc43e94dd)
HX_LOCAL_STACK_FRAME(_hx_pos_9aa8d6444802cb78_145_searchAndReplaceInFile,"src.App","searchAndReplaceInFile",0x3c42f21d,"src.App.searchAndReplaceInFile","App.hx",145,0xc43e94dd)
HX_LOCAL_STACK_FRAME(_hx_pos_9aa8d6444802cb78_172_searchAndReplaceInFiles,"src.App","searchAndReplaceInFiles",0x7e50e7b6,"src.App.searchAndReplaceInFiles","App.hx",172,0xc43e94dd)
namespace src{

void App_obj::__construct(){
            	HX_STACKFRAME(&_hx_pos_9aa8d6444802cb78_12_new)
HXLINE(  36)		this->chunk = (int)50;
HXLINE(  43)		super::__construct();
HXLINE(  72)		{
HXLINE(  19)			::Array< ::String > args = ::Sys_obj::args();
HXLINE(  54)			::String _hx_tmp;
HXDLIN(  54)			if ((args->indexOf(HX_("-d",97,27,00,00),null()) > (int)-1)) {
HXLINE(  54)				_hx_tmp = args->__get((args->indexOf(HX_("-d",97,27,00,00),null()) + (int)1));
            			}
            			else {
HXLINE(  54)				_hx_tmp = null();
            			}
HXDLIN(  54)			this->directory = _hx_tmp;
HXDLIN(  54)			::String _hx_tmp1;
HXDLIN(  54)			if ((args->indexOf(HX_("-f",99,27,00,00),null()) > (int)-1)) {
HXLINE(  54)				_hx_tmp1 = args->__get((args->indexOf(HX_("-f",99,27,00,00),null()) + (int)1));
            			}
            			else {
HXLINE(  54)				_hx_tmp1 = null();
            			}
HXDLIN(  54)			this->fileExtension = _hx_tmp1;
HXLINE(  58)			::Array< ::String > _g = ::Array_obj< ::String >::__new(0);
HXDLIN(  58)			{
HXLINE(  58)				int _g2 = (int)0;
HXDLIN(  58)				int _g1 = args->length;
HXDLIN(  58)				while((_g2 < _g1)){
HXLINE(  58)					_g2 = (_g2 + (int)1);
HXDLIN(  58)					int i = (_g2 - (int)1);
HXDLIN(  58)					if ((args->__get(i) == HX_("-s",a6,27,00,00))) {
HXLINE(  58)						_g->push(args->__get((i + (int)1)));
            					}
            				}
            			}
HXDLIN(  58)			this->search = _g;
HXDLIN(  58)			::Array< ::String > _g3 = ::Array_obj< ::String >::__new(0);
HXDLIN(  58)			{
HXLINE(  58)				int _g21 = (int)0;
HXDLIN(  58)				int _g11 = args->length;
HXDLIN(  58)				while((_g21 < _g11)){
HXLINE(  58)					_g21 = (_g21 + (int)1);
HXDLIN(  58)					int i1 = (_g21 - (int)1);
HXDLIN(  58)					if ((args->__get(i1) == HX_("-r",a5,27,00,00))) {
HXLINE(  58)						_g3->push(args->__get((i1 + (int)1)));
            					}
            				}
            			}
HXDLIN(  58)			this->replace = _g3;
HXLINE(  54)			::String _hx_tmp2;
HXDLIN(  54)			if ((args->indexOf(HX_("-b",95,27,00,00),null()) > (int)-1)) {
HXLINE(  54)				_hx_tmp2 = args->__get((args->indexOf(HX_("-b",95,27,00,00),null()) + (int)1));
            			}
            			else {
HXLINE(  54)				_hx_tmp2 = null();
            			}
HXDLIN(  54)			this->branchname = _hx_tmp2;
HXLINE(  42)			this->createPull = (args->indexOf(HX_("--create-pull",96,42,33,9b),null()) > (int)-1);
HXLINE(  54)			::String _hx_tmp3;
HXDLIN(  54)			if ((args->indexOf(HX_("--pull-message",5f,d5,e6,e9),null()) > (int)-1)) {
HXLINE(  54)				_hx_tmp3 = args->__get((args->indexOf(HX_("--pull-message",5f,d5,e6,e9),null()) + (int)1));
            			}
            			else {
HXLINE(  54)				_hx_tmp3 = null();
            			}
HXDLIN(  54)			this->pullRequestMessage = _hx_tmp3;
HXLINE(  42)			this->dryRun = (args->indexOf(HX_("--dry",cb,f9,12,07),null()) > (int)-1);
            		}
            	}

Dynamic App_obj::__CreateEmpty() { return new App_obj; }

void *App_obj::_hx_vtable = 0;

Dynamic App_obj::__Create(hx::DynamicArray inArgs)
{
	hx::ObjectPtr< App_obj > _hx_result = new App_obj();
	_hx_result->__construct();
	return _hx_result;
}

bool App_obj::_hx_isInstanceOf(int inClassId) {
	if (inClassId<=(int)0x5752985d) {
		return inClassId==(int)0x00000001 || inClassId==(int)0x5752985d;
	} else {
		return inClassId==(int)0x5754195c;
	}
}

void App_obj::run(){
            	HX_GC_STACKFRAME(&_hx_pos_9aa8d6444802cb78_48_run)
HXLINE(  49)		if (hx::IsNull( this->directory )) {
HXLINE(  50)			this->error(HX_("Test directory is required",f4,43,19,c2));
            		}
HXLINE(  53)		if ((this->search->length != this->replace->length)) {
HXLINE(  54)			this->error(((((HX_("Each search should have an equivalent replace. Got ",73,19,db,c7) + this->search->length) + HX_(" searches and ",d3,73,39,f1)) + this->replace->length) + HX_(" replaces.",6f,1d,41,05)));
            		}
HXLINE(  57)		::String files = this->directory;
HXDLIN(  57)		::Array< ::String > files1 = this->getAllFiles(files,::Array_obj< ::String >::__new());
HXLINE(  59)		int range = (int)0;
HXLINE(  62)		{
HXLINE(  62)			int _g_index;
HXDLIN(  62)			int _g_chunkSize;
HXDLIN(  62)			::Array< ::String > _g_array;
HXDLIN(  62)			_g_index = (int)0;
HXDLIN(  62)			_g_array = files1;
HXDLIN(  62)			_g_chunkSize = this->chunk;
HXDLIN(  62)			while((_g_index < _g_array->length)){
HXLINE(  62)				int _g_index1 = _g_index;
HXDLIN(  62)				_g_index = (_g_index + _g_chunkSize);
HXDLIN(  62)				::Array< ::String > filesChunk = _g_array->slice(_g_index1,_g_index);
HXLINE(  63)				bool _hx_tmp;
HXDLIN(  63)				if (!(this->dryRun)) {
HXLINE(  63)					_hx_tmp = !(this->createPull);
            				}
            				else {
HXLINE(  63)					_hx_tmp = true;
            				}
HXDLIN(  63)				if (_hx_tmp) {
HXLINE(  64)					this->searchAndReplaceInFiles(this->search,this->replace,filesChunk);
            				}
HXLINE(  67)				if (this->dryRun) {
HXLINE(  68)					 ::sys::io::Process testProcess =  ::sys::io::Process_obj::__alloc( HX_CTX ,HX_("git",12,84,4e,00),::Array_obj< ::String >::fromData( _hx_array_data_62186df7_5,2));
HXLINE(  70)					if ((testProcess->_hx_stdout->readAll(null())->toString().length > (int)0)) {
HXLINE(  71)						::Sys_obj::command(HX_("git",12,84,4e,00),::Array_obj< ::String >::fromData( _hx_array_data_62186df7_6,1));
HXLINE(  72)						::Sys_obj::command(HX_("git",12,84,4e,00),::Array_obj< ::String >::__new(2)->init(0,HX_("checkout",c6,b4,ff,ac))->init(1,this->directory));
HXLINE(  73)						testProcess->close();
HXLINE(  74)						return;
            					}
HXLINE(  77)					testProcess->close();
            				}
HXLINE(  81)				bool _hx_tmp1;
HXDLIN(  81)				if (this->createPull) {
HXLINE(  81)					_hx_tmp1 = !(this->dryRun);
            				}
            				else {
HXLINE(  81)					_hx_tmp1 = false;
            				}
HXDLIN(  81)				if (_hx_tmp1) {
HXLINE(  82)					int start = range;
HXLINE(  83)					range = (range + this->chunk);
HXDLIN(  83)					int end = range;
HXLINE(  85)					if (hx::IsNull( this->branchname )) {
HXLINE(  85)						this->error(HX_("'-b' branch flag is required when creating a pull request.",84,6d,a7,d3));
            					}
HXLINE(  88)					::String branchnameRange = ((((this->branchname + HX_("_batch_",04,ed,46,c4)) + start) + HX_("_",5f,00,00,00)) + end);
HXLINE(  90)					if (hx::IsEq(  ::sys::io::Process_obj::__alloc( HX_CTX ,HX_("git",12,84,4e,00),::Array_obj< ::String >::__new(4)->init(0,HX_("checkout",c6,b4,ff,ac))->init(1,HX_("-b",95,27,00,00))->init(2,branchnameRange)->init(3,HX_("master",a2,80,20,bb)))->exitCode(null()),(int)0 )) {
            						HX_BEGIN_LOCAL_FUNC_S0(hx::LocalFunc,_hx_Closure_0) HXARGC(1)
            						void _hx_run( ::sys::io::Process process){
            							HX_GC_STACKFRAME(&_hx_pos_9aa8d6444802cb78_99_run)
HXLINE( 100)							::Sys_obj::print(process->_hx_stdout->readAll(null())->toString());
HXLINE( 101)							process->exitCode(null());
HXLINE( 102)							process->close();
            						}
            						HX_END_LOCAL_FUNC1((void))

HXLINE(  92)						this->searchAndReplaceInFiles(this->search,this->replace,filesChunk);
HXLINE(  94)						 ::sys::io::Process_obj::__alloc( HX_CTX ,HX_("git",12,84,4e,00),::Array_obj< ::String >::__new(3)->init(0,HX_("commit",f7,6f,2e,c7))->init(1,HX_("-am",59,7a,22,00))->init(2,(((HX_("Adding update for batch ",b5,75,7f,e2) + start) + HX_(" - ",73,6f,18,00)) + end)))->exitCode(null());
HXLINE(  95)						 ::sys::io::Process_obj::__alloc( HX_CTX ,HX_("git",12,84,4e,00),::Array_obj< ::String >::__new(4)->init(0,HX_("push",da,11,61,4a))->init(1,HX_("-u",a8,27,00,00))->init(2,HX_("origin",e6,19,01,4b))->init(3,branchnameRange))->exitCode(null());
HXLINE(  97)						::String message;
HXDLIN(  97)						if (hx::IsNotNull( this->pullRequestMessage )) {
HXLINE(  97)							message = this->pullRequestMessage;
            						}
            						else {
HXLINE(  97)							message = HX_("",00,00,00,00);
            						}
HXLINE(  99)						::src::util::Hub_obj::pullRequest(::Array_obj< ::String >::__new(4)->init(0,HX_("-m",a0,27,00,00))->init(1,(((HX_("Update batch ",3d,40,8c,ce) + start) + HX_(" - ",73,6f,18,00)) + end))->init(2,HX_("-m",a0,27,00,00))->init(3,message), ::Dynamic(new _hx_Closure_0()));
HXLINE( 105)						 ::sys::io::Process_obj::__alloc( HX_CTX ,HX_("git",12,84,4e,00),::Array_obj< ::String >::fromData( _hx_array_data_62186df7_8,2))->exitCode(null());
            					}
            					else {
HXLINE( 107)						this->error(((HX_("Could not checkout branch '",f7,8e,c5,dc) + branchnameRange) + HX_("'.",27,22,00,00)));
            					}
            				}
            			}
            		}
            	}


HX_DEFINE_DYNAMIC_FUNC0(App_obj,run,(void))

void App_obj::error(::String __o_msg){
::String msg = __o_msg.Default(HX_HCSTRING("","\x00","\x00","\x00","\x00"));
            	HX_STACKFRAME(&_hx_pos_9aa8d6444802cb78_114_error)
HXLINE( 115)		::Sys_obj::println(msg);
HXLINE( 116)		::Sys_obj::exit((int)1);
            	}


HX_DEFINE_DYNAMIC_FUNC1(App_obj,error,(void))

::Array< ::String > App_obj::getAllFiles(::String directory,::Array< ::String > files){
            	HX_STACKFRAME(&_hx_pos_9aa8d6444802cb78_120_getAllFiles)
HXLINE( 121)		if (::sys::FileSystem_obj::exists(directory)) {
HXLINE( 122)			if (::sys::FileSystem_obj::isDirectory(directory)) {
HXLINE( 123)				int _g = (int)0;
HXDLIN( 123)				::Array< ::String > _g1 = ::sys::FileSystem_obj::readDirectory(directory);
HXDLIN( 123)				while((_g < _g1->length)){
HXLINE( 123)					::String file = _g1->__get(_g);
HXDLIN( 123)					_g = (_g + (int)1);
HXLINE( 124)					::String filePath = ::haxe::io::Path_obj::join(::Array_obj< ::String >::__new(2)->init(0,directory)->init(1,file));
HXLINE( 126)					if (!(::sys::FileSystem_obj::isDirectory(filePath))) {
HXLINE( 127)						::String _hx_tmp = ::haxe::io::Path_obj::extension(filePath);
HXDLIN( 127)						if ((_hx_tmp == this->fileExtension)) {
HXLINE( 128)							files->push(filePath);
            						}
            					}
            					else {
HXLINE( 131)						this->getAllFiles(::haxe::io::Path_obj::addTrailingSlash(filePath),files);
            					}
            				}
            			}
            			else {
HXLINE( 135)				files->push(directory);
            			}
            		}
            		else {
HXLINE( 138)			this->error(((HX_("Directory '",94,db,6a,45) + directory) + HX_("' does not exist",9c,d9,8e,aa)));
            		}
HXLINE( 141)		return files;
            	}


HX_DEFINE_DYNAMIC_FUNC2(App_obj,getAllFiles,return )

void App_obj::searchAndReplaceInFile(::String __o_search,::String __o_replace,::String filePath){
::String search = __o_search.Default(HX_HCSTRING("","\x00","\x00","\x00","\x00"));
::String replace = __o_replace.Default(HX_HCSTRING("","\x00","\x00","\x00","\x00"));
            	HX_GC_STACKFRAME(&_hx_pos_9aa8d6444802cb78_145_searchAndReplaceInFile)
HXLINE( 146)		if (!(::sys::FileSystem_obj::exists(filePath))) {
HXLINE( 147)			this->error(((HX_("File: '",a5,ad,8c,cc) + filePath) + HX_("' does not exist",9c,d9,8e,aa)));
            		}
HXLINE( 151)		bool _hx_tmp;
HXDLIN( 151)		if ((search.length != (int)0)) {
HXLINE( 151)			_hx_tmp = (replace.length == (int)0);
            		}
            		else {
HXLINE( 151)			_hx_tmp = true;
            		}
HXLINE( 150)		if (_hx_tmp) {
HXLINE( 154)			this->error(HX_("Search and Replace are required",b8,23,66,c5));
            		}
HXLINE( 157)		::String fileContent = ::sys::io::File_obj::getContent(filePath);
HXLINE( 158)		 ::EReg searchRegex =  ::EReg_obj::__alloc( HX_CTX ,search,HX_("g",67,00,00,00));
HXLINE( 159)		 ::EReg newLineRegex =  ::EReg_obj::__alloc( HX_CTX ,HX_("\\\\n",ee,1f,46,00),HX_("g",67,00,00,00));
HXLINE( 161)		::String updatedContent = searchRegex->replace(fileContent,newLineRegex->replace(replace,HX_("\n",0a,00,00,00)));
HXLINE( 163)		try {
            			HX_STACK_CATCHABLE(::String, 0);
HXLINE( 164)			::sys::io::File_obj::saveContent(filePath,updatedContent);
            		}
            		catch( ::Dynamic _hx_e){
            			if (_hx_e.IsClass< ::String >() ){
            				HX_STACK_BEGIN_CATCH
            				::String errorMessage = _hx_e;
HXLINE( 166)				this->error(errorMessage);
            			}
            			else {
            				HX_STACK_DO_THROW(_hx_e);
            			}
            		}
            	}


HX_DEFINE_DYNAMIC_FUNC3(App_obj,searchAndReplaceInFile,(void))

void App_obj::searchAndReplaceInFiles(::Array< ::String > searches,::Array< ::String > replaces,::Array< ::String > files){
            	HX_STACKFRAME(&_hx_pos_9aa8d6444802cb78_172_searchAndReplaceInFiles)
HXDLIN( 172)		int _g = (int)0;
HXDLIN( 172)		while((_g < files->length)){
HXDLIN( 172)			::String file = files->__get(_g);
HXDLIN( 172)			_g = (_g + (int)1);
HXLINE( 173)			{
HXLINE( 173)				int _g2 = (int)0;
HXDLIN( 173)				int _g1 = searches->length;
HXDLIN( 173)				while((_g2 < _g1)){
HXLINE( 173)					_g2 = (_g2 + (int)1);
HXDLIN( 173)					int i = (_g2 - (int)1);
HXLINE( 174)					this->searchAndReplaceInFile(searches->__get(i),replaces->__get(i),file);
            				}
            			}
            		}
            	}


HX_DEFINE_DYNAMIC_FUNC3(App_obj,searchAndReplaceInFiles,(void))


hx::ObjectPtr< App_obj > App_obj::__new() {
	hx::ObjectPtr< App_obj > __this = new App_obj();
	__this->__construct();
	return __this;
}

hx::ObjectPtr< App_obj > App_obj::__alloc(hx::Ctx *_hx_ctx) {
	App_obj *__this = (App_obj*)(hx::Ctx::alloc(_hx_ctx, sizeof(App_obj), true, "src.App"));
	*(void **)__this = App_obj::_hx_vtable;
	__this->__construct();
	return __this;
}

App_obj::App_obj()
{
}

void App_obj::__Mark(HX_MARK_PARAMS)
{
	HX_MARK_BEGIN_CLASS(App);
	HX_MARK_MEMBER_NAME(directory,"directory");
	HX_MARK_MEMBER_NAME(fileExtension,"fileExtension");
	HX_MARK_MEMBER_NAME(search,"search");
	HX_MARK_MEMBER_NAME(replace,"replace");
	HX_MARK_MEMBER_NAME(branchname,"branchname");
	HX_MARK_MEMBER_NAME(createPull,"createPull");
	HX_MARK_MEMBER_NAME(pullRequestMessage,"pullRequestMessage");
	HX_MARK_MEMBER_NAME(chunk,"chunk");
	HX_MARK_MEMBER_NAME(dryRun,"dryRun");
	HX_MARK_END_CLASS();
}

void App_obj::__Visit(HX_VISIT_PARAMS)
{
	HX_VISIT_MEMBER_NAME(directory,"directory");
	HX_VISIT_MEMBER_NAME(fileExtension,"fileExtension");
	HX_VISIT_MEMBER_NAME(search,"search");
	HX_VISIT_MEMBER_NAME(replace,"replace");
	HX_VISIT_MEMBER_NAME(branchname,"branchname");
	HX_VISIT_MEMBER_NAME(createPull,"createPull");
	HX_VISIT_MEMBER_NAME(pullRequestMessage,"pullRequestMessage");
	HX_VISIT_MEMBER_NAME(chunk,"chunk");
	HX_VISIT_MEMBER_NAME(dryRun,"dryRun");
}

hx::Val App_obj::__Field(const ::String &inName,hx::PropertyAccess inCallProp)
{
	switch(inName.length) {
	case 3:
		if (HX_FIELD_EQ(inName,"run") ) { return hx::Val( run_dyn() ); }
		break;
	case 5:
		if (HX_FIELD_EQ(inName,"chunk") ) { return hx::Val( chunk ); }
		if (HX_FIELD_EQ(inName,"error") ) { return hx::Val( error_dyn() ); }
		break;
	case 6:
		if (HX_FIELD_EQ(inName,"search") ) { return hx::Val( search ); }
		if (HX_FIELD_EQ(inName,"dryRun") ) { return hx::Val( dryRun ); }
		break;
	case 7:
		if (HX_FIELD_EQ(inName,"replace") ) { return hx::Val( replace ); }
		break;
	case 9:
		if (HX_FIELD_EQ(inName,"directory") ) { return hx::Val( directory ); }
		break;
	case 10:
		if (HX_FIELD_EQ(inName,"branchname") ) { return hx::Val( branchname ); }
		if (HX_FIELD_EQ(inName,"createPull") ) { return hx::Val( createPull ); }
		break;
	case 11:
		if (HX_FIELD_EQ(inName,"getAllFiles") ) { return hx::Val( getAllFiles_dyn() ); }
		break;
	case 13:
		if (HX_FIELD_EQ(inName,"fileExtension") ) { return hx::Val( fileExtension ); }
		break;
	case 18:
		if (HX_FIELD_EQ(inName,"pullRequestMessage") ) { return hx::Val( pullRequestMessage ); }
		break;
	case 22:
		if (HX_FIELD_EQ(inName,"searchAndReplaceInFile") ) { return hx::Val( searchAndReplaceInFile_dyn() ); }
		break;
	case 23:
		if (HX_FIELD_EQ(inName,"searchAndReplaceInFiles") ) { return hx::Val( searchAndReplaceInFiles_dyn() ); }
	}
	return super::__Field(inName,inCallProp);
}

hx::Val App_obj::__SetField(const ::String &inName,const hx::Val &inValue,hx::PropertyAccess inCallProp)
{
	switch(inName.length) {
	case 5:
		if (HX_FIELD_EQ(inName,"chunk") ) { chunk=inValue.Cast<  ::Dynamic >(); return inValue; }
		break;
	case 6:
		if (HX_FIELD_EQ(inName,"search") ) { search=inValue.Cast< ::Array< ::String > >(); return inValue; }
		if (HX_FIELD_EQ(inName,"dryRun") ) { dryRun=inValue.Cast< bool >(); return inValue; }
		break;
	case 7:
		if (HX_FIELD_EQ(inName,"replace") ) { replace=inValue.Cast< ::Array< ::String > >(); return inValue; }
		break;
	case 9:
		if (HX_FIELD_EQ(inName,"directory") ) { directory=inValue.Cast< ::String >(); return inValue; }
		break;
	case 10:
		if (HX_FIELD_EQ(inName,"branchname") ) { branchname=inValue.Cast< ::String >(); return inValue; }
		if (HX_FIELD_EQ(inName,"createPull") ) { createPull=inValue.Cast< bool >(); return inValue; }
		break;
	case 13:
		if (HX_FIELD_EQ(inName,"fileExtension") ) { fileExtension=inValue.Cast< ::String >(); return inValue; }
		break;
	case 18:
		if (HX_FIELD_EQ(inName,"pullRequestMessage") ) { pullRequestMessage=inValue.Cast< ::String >(); return inValue; }
	}
	return super::__SetField(inName,inValue,inCallProp);
}

void App_obj::__GetFields(Array< ::String> &outFields)
{
	outFields->push(HX_HCSTRING("directory","\x6d","\xf2","\x44","\x10"));
	outFields->push(HX_HCSTRING("fileExtension","\x63","\xf5","\x4f","\x84"));
	outFields->push(HX_HCSTRING("search","\x68","\x9f","\xf7","\x62"));
	outFields->push(HX_HCSTRING("replace","\x34","\x48","\x28","\xab"));
	outFields->push(HX_HCSTRING("branchname","\xed","\x69","\x59","\xd6"));
	outFields->push(HX_HCSTRING("createPull","\xe1","\xcc","\xee","\x5c"));
	outFields->push(HX_HCSTRING("pullRequestMessage","\xdd","\x64","\x4e","\x85"));
	outFields->push(HX_HCSTRING("chunk","\x6d","\xc6","\xc2","\x45"));
	outFields->push(HX_HCSTRING("dryRun","\xe0","\xa6","\x97","\xef"));
	super::__GetFields(outFields);
};

#if HXCPP_SCRIPTABLE
static hx::StorageInfo App_obj_sMemberStorageInfo[] = {
	{hx::fsString,(int)offsetof(App_obj,directory),HX_HCSTRING("directory","\x6d","\xf2","\x44","\x10")},
	{hx::fsString,(int)offsetof(App_obj,fileExtension),HX_HCSTRING("fileExtension","\x63","\xf5","\x4f","\x84")},
	{hx::fsObject /*Array< ::String >*/ ,(int)offsetof(App_obj,search),HX_HCSTRING("search","\x68","\x9f","\xf7","\x62")},
	{hx::fsObject /*Array< ::String >*/ ,(int)offsetof(App_obj,replace),HX_HCSTRING("replace","\x34","\x48","\x28","\xab")},
	{hx::fsString,(int)offsetof(App_obj,branchname),HX_HCSTRING("branchname","\xed","\x69","\x59","\xd6")},
	{hx::fsBool,(int)offsetof(App_obj,createPull),HX_HCSTRING("createPull","\xe1","\xcc","\xee","\x5c")},
	{hx::fsString,(int)offsetof(App_obj,pullRequestMessage),HX_HCSTRING("pullRequestMessage","\xdd","\x64","\x4e","\x85")},
	{hx::fsObject /*Dynamic*/ ,(int)offsetof(App_obj,chunk),HX_HCSTRING("chunk","\x6d","\xc6","\xc2","\x45")},
	{hx::fsBool,(int)offsetof(App_obj,dryRun),HX_HCSTRING("dryRun","\xe0","\xa6","\x97","\xef")},
	{ hx::fsUnknown, 0, null()}
};
static hx::StaticInfo *App_obj_sStaticStorageInfo = 0;
#endif

static ::String App_obj_sMemberFields[] = {
	HX_HCSTRING("directory","\x6d","\xf2","\x44","\x10"),
	HX_HCSTRING("fileExtension","\x63","\xf5","\x4f","\x84"),
	HX_HCSTRING("search","\x68","\x9f","\xf7","\x62"),
	HX_HCSTRING("replace","\x34","\x48","\x28","\xab"),
	HX_HCSTRING("branchname","\xed","\x69","\x59","\xd6"),
	HX_HCSTRING("createPull","\xe1","\xcc","\xee","\x5c"),
	HX_HCSTRING("pullRequestMessage","\xdd","\x64","\x4e","\x85"),
	HX_HCSTRING("chunk","\x6d","\xc6","\xc2","\x45"),
	HX_HCSTRING("dryRun","\xe0","\xa6","\x97","\xef"),
	HX_HCSTRING("run","\x4b","\xe7","\x56","\x00"),
	HX_HCSTRING("error","\xc8","\xcb","\x29","\x73"),
	HX_HCSTRING("getAllFiles","\x4c","\x60","\x70","\x1f"),
	HX_HCSTRING("searchAndReplaceInFile","\x86","\x6e","\x11","\x38"),
	HX_HCSTRING("searchAndReplaceInFiles","\x2d","\x47","\x2f","\xd7"),
	::String(null()) };

static void App_obj_sMarkStatics(HX_MARK_PARAMS) {
	HX_MARK_MEMBER_NAME(App_obj::__mClass,"__mClass");
};

#ifdef HXCPP_VISIT_ALLOCS
static void App_obj_sVisitStatics(HX_VISIT_PARAMS) {
	HX_VISIT_MEMBER_NAME(App_obj::__mClass,"__mClass");
};

#endif

hx::Class App_obj::__mClass;

void App_obj::__register()
{
	hx::Object *dummy = new App_obj;
	App_obj::_hx_vtable = *(void **)dummy;
	hx::Static(__mClass) = new hx::Class_obj();
	__mClass->mName = HX_HCSTRING("src.App","\xf7","\x6d","\x18","\x62");
	__mClass->mSuper = &super::__SGetClass();
	__mClass->mConstructEmpty = &__CreateEmpty;
	__mClass->mConstructArgs = &__Create;
	__mClass->mGetStaticField = &hx::Class_obj::GetNoStaticField;
	__mClass->mSetStaticField = &hx::Class_obj::SetNoStaticField;
	__mClass->mMarkFunc = App_obj_sMarkStatics;
	__mClass->mStatics = hx::Class_obj::dupFunctions(0 /* sStaticFields */);
	__mClass->mMembers = hx::Class_obj::dupFunctions(App_obj_sMemberFields);
	__mClass->mCanCast = hx::TCanCast< App_obj >;
#ifdef HXCPP_VISIT_ALLOCS
	__mClass->mVisitFunc = App_obj_sVisitStatics;
#endif
#ifdef HXCPP_SCRIPTABLE
	__mClass->mMemberStorageInfo = App_obj_sMemberStorageInfo;
#endif
#ifdef HXCPP_SCRIPTABLE
	__mClass->mStaticStorageInfo = App_obj_sStaticStorageInfo;
#endif
	hx::_hx_RegisterClass(__mClass->mName, __mClass);
}

} // end namespace src
