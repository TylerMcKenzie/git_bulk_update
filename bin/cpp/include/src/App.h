// Generated by Haxe 3.4.7
#ifndef INCLUDED_src_App
#define INCLUDED_src_App

#ifndef HXCPP_H
#include <hxcpp.h>
#endif

#ifndef INCLUDED_src_Cli
#include <src/Cli.h>
#endif
HX_DECLARE_CLASS1(src,App)
HX_DECLARE_CLASS1(src,Cli)

namespace src{


class HXCPP_CLASS_ATTRIBUTES App_obj : public  ::src::Cli_obj
{
	public:
		typedef  ::src::Cli_obj super;
		typedef App_obj OBJ_;
		App_obj();

	public:
		enum { _hx_ClassId = 0x5752985d };

		void __construct();
		inline void *operator new(size_t inSize, bool inContainer=true,const char *inName="src.App")
			{ return hx::Object::operator new(inSize,inContainer,inName); }
		inline void *operator new(size_t inSize, int extra)
			{ return hx::Object::operator new(inSize+extra,true,"src.App"); }
		static hx::ObjectPtr< App_obj > __new();
		static hx::ObjectPtr< App_obj > __alloc(hx::Ctx *_hx_ctx);
		static void * _hx_vtable;
		static Dynamic __CreateEmpty();
		static Dynamic __Create(hx::DynamicArray inArgs);
		//~App_obj();

		HX_DO_RTTI_ALL;
		hx::Val __Field(const ::String &inString, hx::PropertyAccess inCallProp);
		hx::Val __SetField(const ::String &inString,const hx::Val &inValue, hx::PropertyAccess inCallProp);
		void __GetFields(Array< ::String> &outFields);
		static void __register();
		void __Mark(HX_MARK_PARAMS);
		void __Visit(HX_VISIT_PARAMS);
		bool _hx_isInstanceOf(int inClassId);
		::String __ToString() const { return HX_HCSTRING("App","\x81","\xb4","\x31","\x00"); }

		::String directory;
		::String fileExtension;
		::Array< ::String > search;
		::Array< ::String > replace;
		::String branchname;
		bool createPull;
		::String pullRequestMessage;
		 ::Dynamic chunk;
		bool dryRun;
		void run();
		::Dynamic run_dyn();

		void error(::String msg);
		::Dynamic error_dyn();

		::Array< ::String > getAllFiles(::String directory,::Array< ::String > files);
		::Dynamic getAllFiles_dyn();

		void searchAndReplaceInFile(::String search,::String replace,::String filePath);
		::Dynamic searchAndReplaceInFile_dyn();

};

} // end namespace src

#endif /* INCLUDED_src_App */ 
