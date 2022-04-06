<template>
<view>
  <view class="si">
	<view class="content">
		  <view v-for="(item,index) in list01" :key="index" @click="pathchange(item.path,index)" >
		    <image :src="item.ima_url"></image>
		    <view>{{item.title}}</view>
		  </view>
	</view>
	
	<view class="content02">
		  <view v-for="(item,index) in list02" :key="index" @click="pathchange(item.path,index)" >
		    <image :src="item.ima_url"></image>
		    <view>{{item.title}}</view>
		  </view>
	</view>
		
  </view>
</view>
</template>

<script>
	export default {
		data(){
			return {
				list01:[
					{
						ima_url:'/static/images/项目介绍.png',
						title:'基地介绍',
						path:'../../pages/jidi/jidi'
					},
					{
						ima_url:'/static/images/导师.png',
						title:'导师介绍',
						path:'../../pages/daoshi/daoshi'
					},
					{
						ima_url:'/static/images/路线.png',
						title:'研学路线',
						path:'../../pages/luxian/luxian'
					},
					{
						ima_url:'/static/images/课程.png',
						title:'课程',
						path:'../../pages/kecheng01/kecheng01'
					},
					
				],
				list02:[
					{
						ima_url:'/static/images/活动.png',
						title:'活动花絮',
						path:'../../pages/huaxu/huaxu'
					},
					{
						ima_url:'/static/images/评价.png',
						title:'研学评价',
						path:'../../pages/pingjia/pingjia'
					},
					{
						ima_url:'/static/images/推荐.png',
						title:'推荐',
						path:'../../pages/tuijian/tuijian'
					},
					{
						ima_url:'/static/images/收藏.png',
						title:'收藏',
						path:'../../pages/shoucang/shoucang'
					},
					
				],
			}
		},
		methods:{
			pathchange(url,index){
				// this.title=index
				// this.$emit('myValue',index)
				// console.log(url);
				uni.navigateTo({
					url:url+'?id='+index
				})
			}
		},
		onLoad(){
			// uni.$emit('update',{msg:'页面更新'})
		}
	}
</script>

<style>
	.si{
		background-color: white;
	}
	.content,.content02 {
	  background-color: white;
	  margin: 15rpx 0rpx 15rpx 15rpx;
	  width: 96%;
	  height: 160rpx;
	  display: flex;
	  flex-direction: row;
	  align-items: center;
	  justify-content: center;
	}
	.content > view,.content02 > view {
	  flex: 1;
	  font-size: 14px;
	  text-align: center;
	}
	
	.content > view > image,.content02 > view > image {
	  width: 84rpx;
	  height: 70rpx;
	}
</style>
