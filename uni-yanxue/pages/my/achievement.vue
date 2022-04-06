<template>
	<view class="table">
		<view class="tr bg-w">
			<view class="th">课程</view>
			<view class="th">成绩</view>
		</view>
		<view class="tr" v-for="(item,index) in listData" :key="index">
			<view class="td">{{item.code}}</view>
			<view class="td">{{item.text}}</view>
		</view>
	</view>
</template>

<script>
	export default {
		data(){
			return {
				    listData:[
				    {code:"微信小程序",text:"90"},
				    {code:"数据库原理与应用",text:"90"},
				    {code:"node.js",text:"90"},
				    ]
			}
		}
	}
</script>

<style>
	page {
		background-color: #F2F2F2;
	}

	.table {
		border: 0px solid darkgray;
	}

	.tr {
		display: flex;
		width: 100%;
		justify-content: center;
		height: 100rpx;
		line-height: 100rpx;
		align-items: center;
	}

	.td {
		border: 1px solid rgb(198, 204, 209);
		width: 40%;
		height: 100rpx;
		line-height: 100rpx;
		justify-content: center;
		text-align: center;
		background-color: white;
	}

	.th {
		width: 40%;
		height: 100rpx;
		line-height: 100rpx;
		justify-content: center;
		background: #65def3;
		color: #fff;
		display: flex;
		margin-top: 50rpx;
		align-items: center;
	}
</style>
