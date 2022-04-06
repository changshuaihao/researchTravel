<template>
		<view class="content">
		  <view v-for="(item,index) in list" :key="index" @click="pathchange(item.path,index)">
		    <image :src="item.ima_url"></image>
		    <view>{{item.title}}</view>
		  </view>
		</view>
	</view>
</template>

<script>
	export default {
		data(){
			return {
				list:[
					{
						ima_url:'../../static/my/活动.png',
						title:'待开展活动',
						path:'../../pages/my/baseEvaluate'
					},
					{
						ima_url:'../../static/my/首页-待评价.png',
						title:'待评价',
						path:'../../pages/my/baseEvaluate'
					},
					{
						ima_url:'../../static/my/我的评价.png',
						title:'评价',
						path:'../../pages/my/baseEvaluate'
					}
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
	.content {
	  background-color: white;
	  margin: 15rpx 0rpx 15rpx 15rpx;
	  width: 96%;
	  height: 160rpx;
	  display: flex;
	  flex-direction: row;
	  align-items: center;
	  justify-content: center;
	}
	.content > view {
	  flex: 1;
	  font-size: 14px;
	  text-align: center;
	}
	
	.content > view > image {
	  width: 84rpx;
	  height: 70rpx;
	}

</style>
